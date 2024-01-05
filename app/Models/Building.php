<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'user_id'
    ];

    static function upsertInstance($request)
    {
        
        $building = Building::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
                $request->all()
        );

        return $building;

    }

    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }
    static function buildingSelect($request)
    {
        $results = count($request->term) == 2 ? Building::where('name','like','%'.$request->term["term"].'%')->take(10)->get()->toArray() : Building::filter($request->all())->take(10)->get()->toArray();

        return response()->json($results);
    }

    static function fetchBuilding($request)
    {
        $data = Building::where("category_id", $request->category_id)->get(["name", "id"]);
        return $data;
    }

    public function deleteInstance()
    {
        return $this->delete();
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
