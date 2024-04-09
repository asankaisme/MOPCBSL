<?php

namespace App\Models;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lending extends Model
{
    use HasFactory;

    protected $fillable =[
        'takenBy', //the person from the borrowing department
        'asset_id',
        'department_id',
        'lendingDate',
        'returnedDate',
        'isReturned',
        'remarks',
        'isActive',
    ];

    public function asset(){
        return $this->belongsTo(Asset::class);
    }
}
