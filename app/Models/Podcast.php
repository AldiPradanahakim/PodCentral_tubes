<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Podcast extends Model
{
    use HasFactory;

    protected $table = 'podcast';
    protected $fillable = [
        'nama',
        'author_id',
        'desc',
        'id_genre',
        'duration',
        'release_date',
        'files',
        'image'
    ];

    protected $dates = ['release_date'];


    /**
     * Mendapatkan user yang memiliki podcast ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    /**
     * Mendapatkan genre yang memiliki podcast ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }

    /**
     * Relasi dengan table koleksi_item (One to Many)
     */
    public function koleksi_items(): HasMany
    {
        return $this->hasMany(KoleksiItem::class, 'id_podcast');
    }
    /**
     * Relasi dengan table history_item (One to Many)
     */
    public function history_items(): HasMany
    {
        return $this->hasMany(HistoryItem::class, 'id_podcast');
    }
}
