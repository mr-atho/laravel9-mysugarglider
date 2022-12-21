<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShelterModel extends Model
{
    use HasFactory;

    protected $table = "shelters";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'kode', 'alamat', 'status', 'user_id', 'image'
    ];

    public function sugargliders()
    {
        return $this->hasMany(SugargliderModel::class, 'shelter_id');
    }
}
