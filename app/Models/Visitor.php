<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
                'visitor_name',
                'identification_number',
                'nationality',
                'visitor_mobile_no',
                'visitor_enter_time',
                'visitor_out_time',
                'visitor_status',
                'visitor_enter_by'
    ];
}
