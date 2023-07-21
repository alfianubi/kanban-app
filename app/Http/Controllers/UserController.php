<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return "Daftar para pengguna.";
    }    
    public function create()
    {
        return "Formulir untuk membuat pengguna baru";
    }

    public function store()
    {
        return "Menangani formulir yang terkirim dan membuatkan pengguna baru";
    }

    public function show($id)
    {
        return "Menampilkan detail dari pengguna dengan ID: " . $id;
    }

    public function edit($id)
    {
        return "Formulir untuk mengubah pengguna dengan ID: " . $id;
    }

    public function update($id)
    {
        return "Menangani formulir yang terkirim dan memperbarui pengguna dengan ID:" . $id;
    }

    public function destroy($id)
    {
        return "Menghapus pengguna dengan ID: " . $id;
    }
}
