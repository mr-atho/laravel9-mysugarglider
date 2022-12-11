<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SugargliderModel extends Model
{
    use HasFactory;

    protected $table = "sugargliders";
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode', 'nama', 'kelamin', 'oop', 'warna', 'jenis', 'genetika', 'fenotype', 'indukan_betina', 'indukan_jantan', 'gambar', 'keterangan', 'shelter_id', 'adopsi'
    ];

    public function shelter()
    {
        return $this->belongsTo(ShelterModel::class, 'shelter_id');
    }
}
