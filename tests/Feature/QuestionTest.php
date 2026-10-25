<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuestionTest extends TestCase
{
    /**
     * Memastikan halaman formulir pertanyaan dapat diakses melalui /question dan /home.
     */
    public function test_question_form_page_can_be_rendered(): void
    {
        $response = $this->get('/question');
        $response->assertStatus(200);
        $response->assertSee('Form Pertanyaan');

        $responseHome = $this->get('/home');
        $responseHome->assertStatus(200);
        $responseHome->assertSee('Form Pertanyaan');
    }

    /**
     * Memastikan halaman guest menampilkan form kontak & pertanyaan.
     */
    public function test_guest_page_contains_contact_form(): void
    {
        $response = $this->get('/guest');
        $response->assertStatus(200);
        $response->assertSee('Form Pertanyaan');
        $response->assertSee('Kirim Pertanyaan');
    }

    /**
     * Memastikan pengiriman pertanyaan me-redirect kembali ke halaman form/home dengan Flash Data 'info'
     * (Sesuai modifikasi tugas modul pertemuan 5).
     */
    public function test_question_submission_redirects_back_with_flash_info(): void
    {
        $postData = [
            'nama' => 'Fikri',
            'email' => 'fikri@pcr.ac.id',
            'pertanyaan' => 'Tolong jelaskan bagaimana cara mendaftar di PCR',
        ];

        // Simulasi pengiriman dari halaman /home
        $response = $this->from('/home')->post('/question/store', $postData);

        // Harus me-redirect kembali ke /home (bukan return view langsung)
        $response->assertRedirect('/home');
        $response->assertSessionHas('info');

        // Pastikan isi info sesuai instruksi modul
        $info = session('info');
        $this->assertStringContainsString('Terimakasih <strong>Fikri</strong>!', $info);
        $this->assertStringContainsString('Tolong jelaskan bagaimana cara mendaftar di PCR', $info);
        $this->assertStringContainsString('fikri@pcr.ac.id', $info);
    }

    /**
     * Memastikan info flash data tampil di dalam form saat kembali ke halaman form.
     */
    public function test_form_displays_info_alert_from_session(): void
    {
        $infoText = 'Terimakasih <strong>Fikri</strong>! Pertanyaan ini: <strong>Tolong jelaskan bagaimana cara mendaftar di PCR</strong> akan segera direspon melalui email <strong>fikri@pcr.ac.id</strong>';

        $response = $this->withSession(['info' => $infoText])->get('/home');

        $response->assertStatus(200);
        $response->assertSee('Terimakasih <strong>Fikri</strong>!', false);
        $response->assertSee('Tolong jelaskan bagaimana cara mendaftar di PCR', false);
        $response->assertSee('fikri@pcr.ac.id', false);
    }
}
