<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelterOwnerModel extends Model
{
    use HasFactory;

    protected $table = "shelter_owners";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'alamat', 'telp', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
