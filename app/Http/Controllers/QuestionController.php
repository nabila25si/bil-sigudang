<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Menampilkan halaman Form Pertanyaan (home).
     */
    public function create()
    {
        return view('home-question');
    }

    /**
     * Memproses form pertanyaan dan me-redirect kembali ke halaman form (home)
     * dengan membawa Flash Data 'info' sesuai modul pertemuan 5.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'email' => ['required', 'email'],
            'pertanyaan' => 'required|min:8|max:300',
        ]);

        // Pesan info dengan teks bercetak tebal (HTML) sesuai tampilan modul dosen:
        // "Terimakasih {Nama}! Pertanyaan ini: {Pertanyaan} akan segera direspon melalui email {Email}"
        $info = "Terimakasih <strong>{$validated['nama']}</strong>! Pertanyaan ini: <strong>{$validated['pertanyaan']}</strong> akan segera direspon melalui email <strong>{$validated['email']}</strong>";

        // Redirect kembali ke halaman home / sebelumnya dengan flash data 'info'
        return redirect()
            ->back(fallback: route('home'))
            ->with('info', $info);
    }

    /**
     * Menampilkan halaman Respon Pertanyaan (jika dibutuhkan terpisah).
     */
    public function respon()
    {
        if (!session()->has('nama')) {
            return redirect()->route('guest');
        }

        return view('home-question-respon', [
            'nama' => session('nama'),
            'email' => session('email'),
            'pertanyaan' => session('pertanyaan'),
        ]);
    }
}
