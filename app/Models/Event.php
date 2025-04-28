<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'max_attendees',
        'attendees_count'
    ];
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
}
