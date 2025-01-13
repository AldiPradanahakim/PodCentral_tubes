<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';

    protected $fillable = ['nama'];

    /**
     * Get all of the podcasts for the Genre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function podcasts(): HasMany
    {
        return $this->hasMany(Podcast::class, 'id_genre');
    }
}
