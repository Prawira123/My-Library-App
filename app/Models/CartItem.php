<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cart_id',
        'book_id',
        'qty',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
