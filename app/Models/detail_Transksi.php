<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class detail_Transksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksis';
    protected $primaryKey = 'id';
    protected $fillable = ['id_transaksi', 'id_barang', 'jumlah', 'subtotal'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
