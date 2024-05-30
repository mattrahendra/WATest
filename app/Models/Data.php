<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'id',
        'id_pelanggan',
        'tanggal',
        'volume_air'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }

    use HasFactory;
}
