<?php

namespace App\Models;

use App\Models\Lending;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'depName',
        'isActive'
    ];

    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }
}
