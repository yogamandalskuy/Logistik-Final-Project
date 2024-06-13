<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBorrower extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'name',
        'itemsname',
        'qty',
        'startdate',
        'enddate',
    ];
}
