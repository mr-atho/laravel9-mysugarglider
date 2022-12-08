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
        'nama', 'kode', 'alamat', 'status', 'user_id'
    ];

    public function shelter_owner()
    {
        return $this->belongsTo(OwnerModel::class, 'owner_id');
    }

    public function shelter_sugarglider()
    {
        return $this->hasMany(SugargliderModel::class, 'shelter_id');
    }
}
