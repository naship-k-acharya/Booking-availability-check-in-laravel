<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'name',
        'email',
        'checkin',
        'checkout',
        'room_name',
        'room_photo',
        'room_prize',
        // Add more fillable attributes as needed
    ];
}
