<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Gatepass extends Model
{
    use HasFactory, LogsActivity;

    public $fillable = [
        'serialNo',
        'companyName',
        'personName',
        'personNIC',
        'validityDate',
        'reason',
        'createdBy',
        'createdDate',
        'verifiedBy',
        'verifiedDate',
        'authBy',
        'authDate',
        'status',
    ];

    // this method logs all the changes caused in this model.
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    // Eloquent relationships to other model classes are listed below.
    public function userCreated(){
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function userAuth(){
        return $this->belongsTo(User::class, 'authBy');
    }

    public function userVerified(){
        return $this->belongsTo(User::class, 'verifiedBy');
    }

    public function gatepassItem(){
        return $this->hasMany(GatepassItem::class);
    }
}
