<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class GatepassItem extends Model
{
    use HasFactory, LogsActivity;

    public $fillable = [
        'gatepass_id', //This should be the gatepass id (FK)
        'itemName',
        'serialNo',
        'faNo',
        'qty',
        'remarks',
    ];

    // This method logs all the model activities
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    // Eloquent relationships
    public function gatepass(){
        return $this->belongsTo(Gatepass::class);
    }
}
