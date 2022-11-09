<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerModel extends Model
{
    use HasFactory;

    protected $table = "owners";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'alamat', 'telp', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
