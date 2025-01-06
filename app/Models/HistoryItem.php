<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class HistoryItem extends Model
{
    use HasFactory;

    protected $table = 'history_item';
    protected $fillable = [
        'history_id',
        'id_podcast',
    ];


    /**
     * Mendapatkan history yang memiliki history item ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history(): BelongsTo
    {
        return $this->belongsTo(History::class, 'history_id');
    }

    /**
     * Mendapatkan podcast yang memiliki history item ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class, 'id_podcast');
    }
}
