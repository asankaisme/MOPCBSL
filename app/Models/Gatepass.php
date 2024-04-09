<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gatepass extends Model
{
    use HasFactory;

    public $fillable = [
        'serialNo',
        'companyName',
        'personName',
        'personNIC',
        'validityDate',
        'reason',
        'createdBy',
        'createdDate',
        'authBy',
        'authDate',
        'status',
    ];

    public function userCreated(){
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function userAuth(){
        return $this->belongsTo(User::class, 'authBy');
    }

    public function item(){
        return $this->hasMany(GatepassItem::class);
    }
}
