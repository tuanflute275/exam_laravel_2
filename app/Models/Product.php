<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'price', 'sale_price', 'category_id', 'description'];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function scopeSearch($query)
    {
        if (request()->search) {
            $search = request()->search;
            $query = $query->where('name', 'LIKE', '%' . $search . '%');
        }
        return $query;
    }
    public function scopeFilter($query)
    {
        if (request()->order) {
            $order = request()->order;
            $order_arr = explode('-', $order);
            $query = $query->orderBy($order_arr[0], $order_arr[1]);
        }
        return $query;
    }
}
