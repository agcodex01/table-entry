<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the pet that owns the Child
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
