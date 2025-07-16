<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketJawaban extends Model
{
    use HasFactory;

    protected $table = 'tiket_jawaban';
    protected $fillable = ['id_tiket', 'id_user', 'jawaban'];
}
