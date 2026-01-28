<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'penulis',
        'penerbit',
        'rating',
        'tahun_terbit',
        'kategori_id',
        'deskripsi',
        'stok',
        'status',
        'cover',
    ];

    public function category(){
        return $this->belongsTo(BookCategory::class);
    }

    public function cart_items(){
        return $this->hasMany(CartItem::class, 'book_id');
    }

    public function archives(){
        return $this->hasMany(Archive::class, 'book_id');
    }

    public function borrowing_items(){
        return $this->hasMany(BorrowingItem::class, 'book_id');
    }


}
