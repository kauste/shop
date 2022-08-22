<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rate;

class Cloth extends Model
{
    use HasFactory;
    public function rating(){
        return $this->belongsTo(Rate::class, 'id', 'cloth_id');
    }
}
