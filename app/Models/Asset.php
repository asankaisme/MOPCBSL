<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Asset extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable =[
        'category_id',
        'assetName',
        'faNo',
        'serialNo',
        'remarks',
        'isActive',
    ];

    // This method logs all the model activities
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable();
    }

    // Eloquent relationships
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function lending(){
        return $this->hasOne(Lending::class);
    }
}
