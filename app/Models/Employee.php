<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function employee_details()
    {
        return $this->belongsTo(EmployeeDetail::class,'employee_id','id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
