<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'appointment_date'];

    protected $casts = [
        'appointment_date' => 'datetime', // Cast to Carbon instance
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
