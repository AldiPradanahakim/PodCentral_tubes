<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'profile_image',
        'role_id',  // Menambahkan role_id agar bisa diisi saat mass-assignment
    ];

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi dengan table podcast (One to Many)
    public function podcasts(): HasMany
    {
        return $this->hasMany(Podcast::class, 'author_id');
    }

    // Relasi dengan table collections (One to Many)
    public function collections(): HasMany
    {
        return $this->hasMany(Koleksi::class, 'id_user');
    }

    // Relasi dengan table histories (One to Many)
    public function histories(): HasMany
    {
        return $this->hasMany(History::class, 'id_user');
    }

    // Relasi dengan model Role (BelongsTo)
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'Role_id');
    }
}
