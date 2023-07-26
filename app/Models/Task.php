<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // menambahkan Property $fillable dalam Laravel digunakan untuk meningkatkan keamanan
    protected $fillable = ['name', 'detail', 'due_date', 'status'];
}
