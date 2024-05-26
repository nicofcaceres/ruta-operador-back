<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journey extends Model
{
    use HasFactory;

    protected $fillable = [
        'technical_id',
        'start_at',
        'end_at',
    ];

    /**
     * Get the user associated with the journey.
     */
    public function technical(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
