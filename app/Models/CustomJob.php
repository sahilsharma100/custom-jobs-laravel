<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomJob extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payload',
        'status',
        'tried',
        'exception'
    ];

    /**
     * Get the Job Payload.
     *
     * @param  string  $value
     * @return string
     */
    public function getPayloadAttribute($value)
    {
        return json_decode($value);
    }
}
