<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Leave extends Model
{
    //

    protected $dates =['start_date','end_date'];

    protected $fillable = [
        'subject', 'emp_id', 'start_date','end_date','description','status','count_leave'
    ];
}
