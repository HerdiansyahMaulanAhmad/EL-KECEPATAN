<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens';
    protected $dates = ['umur'];

    protected $guarded = [];

    public function daftar(): HasMany {
        return $this->hasmany(Daftar::class);
    }

}
