<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query,$filter){

        $query->when($filter['search']??false,function($query,$search){
            $query->where(function($query)use($search){
                $query->where('name','LIKE','%'.$search.'%')
                      ->orWhere('description','LIKE','%'.$search.'%');
            });
        });

        $query->when($filter['category']??false,function($query,$id){
            $query->whereHas('category',function($query)use($id){
                $query->where('id',$id);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
