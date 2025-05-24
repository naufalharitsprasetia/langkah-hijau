<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Beranda';
        $active = 'beranda';
        return view('home.index', compact('active', 'title'));
    }
    public function tentang()
    {
        $title = 'Tentang Aplikasi';
        $active = 'tentang';
        return view('home.tentang', compact('active', 'title'));
    }
    public function kontak()
    {
        $title = 'Kontak Kami';
        $active = 'kontak';
        return view('home.kontak', compact('active', 'title'));
    }
}