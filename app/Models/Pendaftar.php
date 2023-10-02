<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function program(){
        return $this->belongsTo(Program::class, 'jenis_id', 'id');
    }

    public function lulusan(){
        return $this->belongsTo(Lulusan::class, 'lulusan_id', 'id');
    }
}
