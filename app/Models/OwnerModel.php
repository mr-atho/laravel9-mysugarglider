<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OwnerModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "owner";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'alamat', 'telp', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
