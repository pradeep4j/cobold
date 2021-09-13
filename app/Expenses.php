<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = ['logged_user_id','members_id','expenses','date_expensed'];
}
