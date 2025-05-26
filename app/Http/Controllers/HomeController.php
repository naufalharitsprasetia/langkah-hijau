<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Beranda';
        $active = 'beranda';
        $postUtama = Post::latest()->first();
        $posts = Post::where('id', '!=', $postUtama->id)->latest()->limit(3)->get();
        // dd($postUtama);
        return view('home.index', compact('active', 'title', 'postUtama', 'posts'));
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
