<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 * @property int id
 * @property int views
 * @property Topic topic
 * @property Collection messages
 * @property User user
 */
class Subtopic extends Model
{
    use HasFactory;

    public function topic(): BelongsTo
    {
    	return $this->belongsTo(Topic::class);
    }

    public function messages(): HasMany
    {
    	return $this->hasMany(Message::class);
    }

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
