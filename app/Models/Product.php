<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan trait HasFactory untuk fitur factory model dan SoftDeletes untuk soft delete data (menghapus secara logis).

    protected $guarded = ['id']; // Melindungi kolom 'id' agar tidak diisi secara massal (mass assignment) saat menggunakan metode seperti create() atau update().

    public function category()
    {
        // Mendefinisikan relasi "belongs to" antara model ini dan model Category.
        // Mengindikasikan bahwa setiap instance model ini berhubungan dengan satu kategori, menggunakan foreign key 'category_id'.
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function creator()
    {
        // Mendefinisikan relasi "belongs to" antara model ini dan model User.
        // Mengindikasikan bahwa setiap instance model ini berhubungan dengan satu pengguna (user) sebagai pencipta (creator).
        return $this->belongsTo(User::class);
    }
}
