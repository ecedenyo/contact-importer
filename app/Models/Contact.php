<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'birthdate', 'telephone', 'address', 'creditcard_number', 'creditcard_lastnumbers', 'franchise', 'email', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
