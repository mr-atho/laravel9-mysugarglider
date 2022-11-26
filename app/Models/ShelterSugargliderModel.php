<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelterSugargliderModel extends Model
{
    use HasFactory;

    protected $table = "shelter_sugargliders";
    protected $primaryKey = 'id';

    public function shelter()
    {
        return $this->belongsTo(ShelterModel::class, 'shelter_id');
    }

    public function sugarglider()
    {
        return $this->belongsTo(SugargliderModel::class, 'sugarglider_id');
    }
}
