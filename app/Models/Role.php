<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Tentukan nama tabel (optional jika tabelnya mengikuti konvensi plural dari model)
    protected $table = 'roles';

    // Tentukan kolom yang boleh diisi (fillable)
    protected $fillable = [
        'name',
    ];

    // Menambahkan relasi jika diperlukan di kemudian hari, misalnya dengan User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
