<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserveroom extends Model
{
    use HasFactory;
    protected $table = 'reserverooms';

    protected $fillable = [
        'id',
         'name',
        'prize' ,
        'roomphoto',
    ];
}
