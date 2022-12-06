<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;

    protected $table = "profiles";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'alamat', 'telp', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function profile_shelter()
    {
        return $this->hasMany(ShelterModel::class, 'profile_id');
    }
}
