<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Koleksi extends Model
{
    use HasFactory;

    protected $table = 'koleksi';
    protected $fillable = [
        'user_id',
    ];


    /**
     * Mendapatkan user yang memiliki koleksi ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Relasi dengan table koleksi_item (One to Many)
     */
    public function koleksi_items(): HasMany
    {
        return $this->hasMany(KoleksiItem::class, 'koleksi_id');
    }
}
