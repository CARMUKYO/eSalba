<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueReport extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'photo_path', 'latitude', 'longitude',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
