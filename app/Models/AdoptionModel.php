<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdoptionModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "adoptions";
    protected $primaryKey = 'id';
    protected $fillable = [
        'collection_id', 'user_id', 'harga', 'status', 'keterangan'
    ];
}
