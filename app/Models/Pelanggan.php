<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'alamat',
        'telepon'
    ];
}
