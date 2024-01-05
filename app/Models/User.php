<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;
use Image;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role_id',
        'suspend',
        'phone',
        'country_code',
        'email',
        'password',
    ];
    protected static function booted()
    { 
        if(Auth::hasUser())
        {
            if(! Auth::user()->isSuperAdmin())
            {
                static::addGlobalScope(new TenantScope);
            } 
        } 
    }
      static function upsertInstance($request)
    {
        // remove the first 0 from the phone number
        $phone = ltrim($request->phone, '0');

        $request->merge([
            'country_code' => $request->country_code,
            'phone' => $phone
        ]);
                 

        $user = User::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
                $request->all()
            );


        $name = 'picture_'.$user->id.'.png';

        if ($request->file('picture')) {
            $image = $request->file('picture');

            if (!file_exists(public_path('users/'.$user->id.'/').$name)) {
                mkdir(public_path('users/'.$user->id.'/'));
            }

            Image::make($image)->fit(120, 120)->save(public_path('users/'.$user->id.'/').$name);

            $user->picture()->updateOrCreate(
            [
                'imageable_id' => $user->id,
                'use_for' => 'picture'
            ],
            [
                'name' => $name,
                'use_for' => 'picture'
            ]);
        }

        return $user;
    }
    
    static function statusUpdate($request)
    {
        return User::where('id', $request->id)->update(['suspend' => $request->suspend]);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name','like','%'.$request['name'].'%')
                ->orWhere('email','like','%'.$request['name'].'%')
                ->orWhere('phone','like','%'.$request['name'].'%');
        }

        return $query;
    }



    public function isSuperAdmin() 
    {
        return auth()->user()->role->id == SUPERADMIN;
    }

    public function isPartner() 
    {
        return auth()->user()->role->id == USER;
    }

    public function allPrivilege() 
    {
        return auth()->user()->role->all_privileges == 1;
    }
    
     public function getAvatarNameAttribute()
    {
        $name = Auth::user()->name;
        $nameParts = explode(' ', trim($name));
        $firstName = array_shift($nameParts);
        $lastName = array_pop($nameParts);

        $initials = (
            mb_substr(ucfirst($firstName), 0, 1) . ($lastName ?
            mb_substr(ucfirst($lastName), 0, 1) : mb_substr(ucfirst($firstName), 0, 1))
        );

        return $initials;
    }
    
    public function deleteInstance()
    {
        return $this->delete();
    }


     public function picture()
    {
        return $this->morphOne(Gallary::class,'imageable')->where('use_for', 'picture');
    }
    
    public function hasPrivilege($privilege)
    {
        if ( $this->isSuperAdmin() || $this->isPartner() || $this->allPrivilege() ) {
            return true;
        }

        return auth()->user()->role->privileges->whereIn('id',[$privilege])->count();
    }

    public function role()
    {
        return  $this->belongsTo(Role::class, 'role_id');
    }
}
