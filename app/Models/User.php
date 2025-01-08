<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'profile_image',
    ];

<<<<<<< HEAD
=======
    //  Menentukan atribut yang boleh diisi
  //   protected $fillable = [
  //     'name',
  //     'email',
  //     'password',
  //     'genres', 
  //     'created_at',
  //   ];

    //  Menentukan atribut yang tidak boleh diisi
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
>>>>>>> c14c123b004419b02eb7023fcf95216989663a59
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi dengan table podcast (One to Many)
     */
    public function podcasts(): HasMany
    {
        return $this->hasMany(Podcast::class, 'author_id');
    }


    /**
     * Get all collection for user
     */
    public function collections(): HasMany
    {
        return $this->hasMany(Koleksi::class, 'id_user');
    }

    /**
     * Get all history for user
     */
    public function histories(): HasMany
    {
        return $this->hasMany(History::class, 'id_user');
    }
}
