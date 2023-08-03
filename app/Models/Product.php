<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public function getCategory(){
        $category = Category::find($this->category_id);
       // dd($category);
        return $category;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount() {
        if (!is_null($this->pivot)){
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

}
