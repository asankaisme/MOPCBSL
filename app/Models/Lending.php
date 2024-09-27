<?php

namespace App\Models;

use App\Models\Asset;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lending extends Model
{
    use HasFactory;

    protected $fillable =[
        'asset_id',
        'department_id',
        'lendingDate',
        'taken_by', //the person from the borrowing department
        'issued_by', // the person who issued the asset to the requester
        'returned_date',
        'isReturned', // 0- No, 1-yes
        'remarks',
        'isActive',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function issuedBy()
    {
        return $this->belongsTo(User::class);
    }
}
