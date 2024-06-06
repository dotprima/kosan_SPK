<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = ['nama','C1','C2','C3','C4','C5','C6','C7','C8','C9','kriteria_id'];

    public function kriteria(){
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }
}
