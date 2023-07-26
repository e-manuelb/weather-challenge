<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Weather extends Model
{
    use HasFactory;

    protected $table = 'weathers';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'description',
        'synced_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn (string $description) => json_decode($description, true)
        );
    }
}
