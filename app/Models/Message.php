<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

	public function subtopic(): BelongsTo
    {
    	return $this->belongsTo(Subtopic::class);
	}

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

	public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
