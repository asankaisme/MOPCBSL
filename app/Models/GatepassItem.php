<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatepassItem extends Model
{
    use HasFactory;

    public $fillable = [
        'gatepass_id',
        'itemName',
        'serialNo',
        'faNo',
        'qty',
        'remarks',
    ];

    public function gatepass(){
        return $this->belongsTo(Gatepass::class);
    }
}
