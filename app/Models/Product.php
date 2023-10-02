<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','code','description','category_id','image','price','hit','new','recommend',
    ];

    // public function getCategory(){
    //     $category = Category::find($this->category_id);
    //    // dd($category);
    //     return $category;
    // }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount() {
        if (!is_null($this->pivot)){
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

    public function isHit(){
        return $this->hit ===1;
    }

    public function isNew(){
        return $this->new ===1;
    }

    public function isRecommend(){
        return $this->recommend ===1;
    }

    public function scopeHit($query){
        return $query->where('hit',1);
    }

    public function scopeNew($query){
        return $query->where('new',1);
    }

    public function scopeRecommend($query){
        return $query->where('recommend',1);
    }

}
