<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baterai extends Model
{
    protected $table = 'baterai';

    protected $fillable = [
        'id',
        'id_pelanggan',
        'persentase_baterai',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }

    use HasFactory;
}