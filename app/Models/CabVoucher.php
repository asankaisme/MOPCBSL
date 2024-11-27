<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class CabVoucher extends Model
{
    use HasFactory, LogsActivity;

    // Log only changed attributes
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'requesterName',
        'bank_id',
        'requestDate',
        'cv_provider',
        'cv_number',
        'cv_from',
        'cv_to',
        'cab_no',
        'vehicle_no',
        'km_done',
        'amount',
        'remarks',
        'status', // NEW,ISSEUD, RETURNED, USED, RECIEVED
        'isActive',
        'issuedBy',
    ];

    // This method logs all the model activities
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    // Eloquent relationships
    public function UserRequested()
    {
        return $this->belongsTo(User::class, 'requesterName');
    }
}
