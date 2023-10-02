<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lulusan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pendaftars(){
        return $this->hasMany(Pendaftar::class, 'lulusan_id', 'id');
    }
}
