<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    protected $fillable = ['idtiket', 'id_user',  'subject', 'pesan', 'status', 'NPM', 'kategori'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function jawaban()
    {
        return $this->hasMany(TiketJawaban::class, 'id_tiket');
    }
}
