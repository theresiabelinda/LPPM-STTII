<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    // Jika di migration pakai $table->id(), maka primary key otomatis 'id'
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_dosen',
        'nidn',
    ];
}
