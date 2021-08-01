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

    /**
     * Mutator
     */
    public function setMetaAttribute($value)
    {
        $this->attributes['meta'] = json_encode($value);
    }

    public function getMetaAttribute($value)
    {
        return json_decode($value);
    }

    public function setDocsAttribute($value)
    {
        $this->attributes['docs'] = json_encode($value);
    }

    public function getDocsAttribute($value)
    {
        return json_decode($value);
    }
}
