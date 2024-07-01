<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosan extends Model
{
  

    protected $table = 'kosan';

    protected $fillable = [
        'nama', 'alamat', 'kontak', 'lokasi', 'alternatif_id', 'image'
    ];

  
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
