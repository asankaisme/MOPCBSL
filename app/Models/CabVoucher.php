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
        'bank_id',
        'requestDate',
        'cv_provider',
        'cv_number',
        'cv_from',
        'cv_to',
        'cab_no',
        'vehicle_no',
        'amount',
        'remarks',
        'status', // NEW,ISSEUD, RETURNED, USED, RECIEVED
        'isActive',
        'issuedBy',
    ];

    public function UserRequested()
    {
        return $this->belongsTo(User::class, 'requesterName');
    }
}
