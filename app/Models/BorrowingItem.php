<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowingItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'book_id',
        'user_id',
        'qty',
        'tanggal_pinjam',
        'tanggal_kembali_rencana',
        'tanggal_kembali_aktual',
        'status',
        'denda',
        'kode_peminjaman',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function borrowing(){
        return $this->belongsTo(Borrowing::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
