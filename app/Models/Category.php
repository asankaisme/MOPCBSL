<?php

namespace App\Models;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
        'isActive',
    ];
    
    public function asset(){
        return $this->hasMany(Asset::class);
    }

}
