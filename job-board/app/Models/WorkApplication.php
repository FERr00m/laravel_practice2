<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkApplication extends Model
{
    /** @use HasFactory<\Database\Factories\WorkApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'expected_salary',
        'user_id',
        'work_id',
    ];
    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
