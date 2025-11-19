@extends('layouts.app')

@section('title', 'Profil - Masjid Al Muta\'allimin')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">{{ $profile->hero_title }}</h1>
                <p class="lead">{{ $profile->hero_subtitle }}</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <img src="{{ $profile->about_image ? asset('storage/' . $profile->about_image) : 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?w=800' }}" 
                     alt="Masjid Al Muta'allimin" 
                     class="img-fluid rounded-3 shadow-lg">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Tentang Masjid</h2>
                <p class="text-muted mb-4">
                    {{ $profile->about_text }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle p-3 me-3">
                                <i class="bi bi-eye fs-4"></i>
                            </div>
                            <h3 class="mb-0">Visi</h3>
                        </div>
                        <p class="text-muted mb-0">
                            {{ $profile->vision }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card card-custom h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-circle p-3 me-3">
                                <i class="bi bi-bullseye fs-4"></i>
                            </div>
                            <h3 class="mb-0">Misi</h3>
                        </div>
                        <ul class="text-muted mb-0">
                            @foreach($profile->mission as $mission)
                                <li class="mb-2">{{ $mission }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card card-custom border-primary border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-primary mb-2">{{ $profile->capacity }}</h2>
                        <p class="text-muted mb-0">Kapasitas Jamaah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom border-success border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-success mb-2">{{ $profile->established_year }}</h2>
                        <p class="text-muted mb-0">Tahun Peresmian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom border-warning border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-warning mb-2">{{ $profile->activities }}</h2>
                        <p class="text-muted mb-0">Kegiatan Rutin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom border-info border-3">
                    <div class="card-body">
                        <h2 class="display-4 fw-bold text-info mb-2">{{ $profile->public_access }}</h2>
                        <p class="text-muted mb-0">Untuk Umum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Lokasi Masjid</h2>
            <p class="text-muted">{{ $profile->address }}</p>
        </div>
        
        <div class="card card-custom">
            <div class="card-body p-0">
                <iframe src="{{ $profile->google_maps_url }}" 
                        width="100%" 
                        height="400" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/{{ $profile->whatsapp_number }}" 
   class="wa-floating" 
   target="_blank">
    <i class="bi bi-whatsapp"></i>
</a>

<style>
.wa-floating {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background-color: #25D366;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    z-index: 9999;
    text-decoration: none;
    transition: 0.3s ease;
}

.wa-floating:hover {
    transform: scale(1.1);
    background-color: #1ebe5b;
}
</style>

@endsection