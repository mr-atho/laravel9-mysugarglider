<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelterModel extends Model
{
    use HasFactory;

    protected $table = "shelters";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'kode', 'alamat', 'status'
    ];
}
