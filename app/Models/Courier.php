<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    // ✅ Allow mass assignment for these fields
    protected $fillable = [
        'tracking_number',
        'sender_name',
        'receiver_name',
        'origin',
        'destination',
        'status_id',
        'delivery_date',
    ];

    // ✅ Relationship: Each courier belongs to one status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
