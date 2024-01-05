<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'category_id'
    ];

    
    //Tenancy
    protected static function booted()
    { 
        if(Auth::hasUser())
        {
            if(! Auth::user()->isSuperAdmin())
            {
                static::addGlobalScope(new TenantScope(''));
            } 
        } 
    }

    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }

    static function upsertInstance($request)
    {   
        $item = Item::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
                $request->all()
        );

        return $item;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function deleteInstance()
    {
        return $this->delete();
    }


}
