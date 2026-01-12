<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebContent; 

class FrontendController extends Controller
{
    public function index()
    {
        // Kita menggunakan data dari kategori 'profil' untuk sementara.
        $profilContents = WebContent::where('section_key', 'profil')->latest()->get();

        // 1. Ambil item pertama untuk Hero Slider
        $heroContent = $profilContents->first();
        
        // 2. Ambil item kedua (skip 1) untuk Welcome Text di bawah slider
        $welcomeContent = $profilContents->skip(1)->first();

        return view('frontend.home', compact('heroContent', 'welcomeContent'));
    }

    public function profil()
    {
        // UPDATE: Ambil data spesifik untuk 3 bagian profil
        //whereIn akan mengambil semua konten yang punya key salah satu dari ketiganya
        $contents = WebContent::whereIn('section_key', ['profil_tentang', 'profil_visi', 'profil_struktur'])->latest()->get();
        
        // Kita grouping manual agar mudah dipanggil di view
        $contents = $contents->groupBy('section_key');

        return view('frontend.profil-kampus', compact('contents'));
    }

    public function penelitian()
    {
        // Ambil data yang section_key = 'penelitian'
        $contents = WebContent::where('section_key', 'penelitian')->latest()->get();
        return view('frontend.penelitian', compact('contents'));
    }

    public function pengabdian()
    {
        // Ambil data yang section_key = 'pengabdian'
        $contents = WebContent::where('section_key', 'pengabdian')->latest()->get();
        return view('frontend.pengabdian', compact('contents'));
    }

    public function publikasi()
    {
        // Ambil data yang section_key = 'publikasi'
        $contents = WebContent::where('section_key', 'publikasi')->latest()->get();
        return view('frontend.publikasi', compact('contents'));
    }

    public function kkn()
    {
        // Ambil data yang section_key = 'kkn'
        $contents = WebContent::where('section_key', 'kkn')->latest()->get();
        return view('frontend.kkn', compact('contents'));
    }
}