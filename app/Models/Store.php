<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'description',
        'link',
        'category_id',
        'logo',
        'affiliation_code',
        'discount',
        'commission',
        'is_hidden'
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }
}
