<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'doc_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mutator
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }

    public function docType()
    {
       return $this->belongsTo(DocType::class);
    }
}
