<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class History extends Model
{
    use HasFactory;

    protected $table = 'history';
    protected $fillable = [
        'id_user',
    ];

    /**
     * Mendapatkan user yang memiliki history ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relasi dengan table history_item (One to Many)
     */
    public function history_items(): HasMany
    {
        return $this->hasMany(HistoryItem::class, 'history_id');
    }
}
