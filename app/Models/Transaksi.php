<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['tanggal_transaksi', 'total_harga', 'id_pelanggan'];
}
