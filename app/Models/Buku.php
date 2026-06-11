<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'books'; 

    protected $primaryKey = 'id_buku'; 

    protected $fillable = [
        'judul', 'jenis_koleksi', 'media', 'pengarang', 
        'penerbit', 'tahun', 'cetakan', 'edisi', 'status', 'user_id'
    ]; 

    public $timestamps = false;
}