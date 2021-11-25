<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'image',
    //     'company',
    //     'name',
    //     'year',
    //     'price',
    //     'type',
    //     'style',
    // ];

    protected $guarded = [];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
