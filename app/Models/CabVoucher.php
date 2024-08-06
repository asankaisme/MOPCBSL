<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CabVoucher extends Model
{
    use HasFactory;

    public $fillable = [
        'requesterName',
        'requestDate',
        'cv_from',
        'cv_to',
        'cab_no',
        'vehicle_no',
        'amount',
        'remarks',
        'isActive',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
