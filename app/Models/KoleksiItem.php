<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KoleksiItem extends Model
{
    use HasFactory;

    protected $table = 'koleksi_item';
    protected $fillable = [
        'koleksi_id',
        'id_podcast',
    ];


    /**
     * Mendapatkan koleksi yang memiliki koleksi item ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function koleksi(): BelongsTo
    {
        return $this->belongsTo(Koleksi::class, 'koleksi_id');
    }

    /**
     * Mendapatkan podcast yang memiliki koleksi item ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class, 'id_podcast');
    }
}
