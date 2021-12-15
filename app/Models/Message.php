<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Eloquent
 * @property int id
 * @property string body
 * @property User user
 * @property int user_id
 * @property int subtopic_id
 */
class Message extends Model
{
    use HasFactory;

	public function subtopic(): BelongsTo
    {
    	return $this->belongsTo(Subtopic::class);
	}

	public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
