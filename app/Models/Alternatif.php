<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model {
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi'];

    public function nilaiAlternatifs() {
        return $this->hasMany(NilaiAlternatif::class);
    }
}
