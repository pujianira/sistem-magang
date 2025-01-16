<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    protected $table = 'pembina';
    public $timestamps = false;

    protected $fillable = ['nip', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftar()
    {
        return $this->hasMany(Pembina::class, 'nip', 'nip_pembina');
    }
}
