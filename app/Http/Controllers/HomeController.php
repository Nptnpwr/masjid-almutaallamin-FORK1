<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\News;
use App\Models\Gallery;
use App\Models\DonationAccount;
use App\Models\PrayerTime;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home page
    public function index()
    {
        $activities = Activity::latest()->take(3)->get();
        $news = News::latest()->take(3)->get();
        $galleries = Gallery::latest()->take(4)->get();
        $prayerTime = PrayerTime::whereDate('date', now())->first();
        
        return view('home', compact('activities', 'news', 'galleries', 'prayerTime'));
    }

    // Profil page 
    public function profil()
    {
        $profile = Profile::first();
        
        if (!$profile) {
            // Buat data default jika belum ada
            $profile = Profile::create([
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
                'whatsapp_number' => '6281234567890'
            ]);
        }

        return view('profil', compact('profile'));
    }

    public function jadwal()
    {
        $prayerTime = PrayerTime::whereDate('date', now())->first();
        return view('jadwal', compact('prayerTime'));
    }

    public function kegiatan()
    {
        $activities = Activity::latest()->paginate(9);
        return view('kegiatan', compact('activities'));
    }

    public function berita()
    {
        $news = News::latest()->paginate(9);
        return view('berita', compact('news'));
    }

    public function beritaDetail($id)
    {
        $newsItem = News::findOrFail($id);
        $recentNews = News::where('id', '!=', $id)->latest()->take(3)->get();
        return view('news.detail', compact('newsItem', 'recentNews'));
    }

    public function galeri()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('galeri', compact('galleries'));
    }

    public function donasi()
    {
        $donations = DonationAccount::all();
        return view('donasi', compact('donations'));
    }
}