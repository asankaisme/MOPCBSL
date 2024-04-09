<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatepassReason extends Model
{
    use HasFactory;

    public $fillable = [
        'reason',
        'status'
    ];
}
