<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'assetName',
        'faNo',
        'serialNo',
        'isActive',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function lending(){
        return $this->hasOne(Lending::class);
    }
}
