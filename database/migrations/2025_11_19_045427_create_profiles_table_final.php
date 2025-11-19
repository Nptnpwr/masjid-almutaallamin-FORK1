<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('profiles')) {
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->string('hero_title')->default('Profil Masjid');
                $table->text('hero_subtitle')->nullable();
                $table->text('about_text');
                $table->string('about_image')->nullable();
                $table->text('vision');
                $table->json('mission');
                $table->string('capacity')->default('780');
                $table->string('established_year')->default('2025');
                $table->string('activities')->default('5+');
                $table->string('public_access')->default('100%');
                $table->text('address');
                $table->text('google_maps_url');
                $table->string('whatsapp_number');
                $table->timestamps();
            });
            
            // Tambah data default
            \DB::table('profiles')->insert([
                'hero_title' => 'Profil Masjid',
                'hero_subtitle' => 'Mengenal lebih dekat Masjid Al Muta\'allimin Fakultas Teknik Untirta',
                'about_text' => 'Masjid Al Muta\'allimin Fakultas Teknik Untirta diresmikan pada 14 Februari 2025 dan mampu menampung hingga 780 jamaah. Masjid ini menjadi pusat ibadah, kajian, dan pembinaan rohani civitas akademika, sekaligus sarana membangun keseimbangan antara spiritualitas dan akademik.',
                'vision' => 'Menjadi pusat ibadah dan pengembangan iman-ilmu di Universitas Sultan Ageng Tirtayasa yang mampu mencetak generasi yang berakhlak mulia, cerdas, dan berdaya saing.',
                'mission' => json_encode([
                    'Memfasilitasi kegiatan ibadah yang khusyuk dan berkualitas',
                    'Menyelenggarakan kajian dan pembinaan keislaman',
                    'Membangun kebersamaan dan silaturahmi civitas akademika',
                    'Mengintegrasikan nilai-nilai Islam dalam kehidupan akademik'
                ]),
                'capacity' => '780',
                'established_year' => '2025',
                'activities' => '5+',
                'public_access' => '100%',
                'address' => 'Jl. Jenderal Sudirman KM 3, Kotabumi, Kec. Purwakarta, Kota Cilegon, Banten 42435',
                'google_maps_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2607240453586!2d106.02115!3d-6.2281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMnNDEuMiJTIDEwNsKwMDEnMTYuMSJF!5e0!3m2!1sid!2sid!4v1234567890',
                'whatsapp_number' => '6281234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};