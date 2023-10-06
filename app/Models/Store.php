<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'validity',
        'is_hidden'
    ];

    protected $dates = ['validity'];


    public function getValidityAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }



    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}
