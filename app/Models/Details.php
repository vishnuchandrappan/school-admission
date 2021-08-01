<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta',
        'image',
        'docs',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
