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
        'files', // <-- Pastikan kolom ieu aya
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
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function koleksi_items(): HasMany
    {
        return $this->hasMany(KoleksiItem::class, 'id_podcast');
    }
    /**
     * Relasi dengan table history_item (One to Many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history_items(): HasMany
    {
        return $this->hasMany(HistoryItem::class, 'podcast_id');
    }

    public function isInUserCollection($userId)
    {
        return KoleksiItem::whereHas('koleksi', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->where('id_podcast', $this->id)->exists();
    }
}
