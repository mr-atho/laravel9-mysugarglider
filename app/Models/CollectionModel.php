<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectionModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "collections";
    protected $primaryKey = 'id';
    protected $fillable = [
        'shelter_id', 'sugarglider_id', 'user_id', 'status'
    ];

    // One to Many - Shelter Table
    public function shelter()
    {
        return $this->belongsTo(ShelterModel::class, 'shelter_id')->withTrashed();
    }

    // One to Many - Sugar Glider Table
    public function sugarglider()
    {
        return $this->belongsTo(SugargliderModel::class, 'sugarglider_id')->withTrashed();
    }
}
