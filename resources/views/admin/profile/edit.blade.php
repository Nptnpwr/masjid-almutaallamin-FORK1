@extends('layouts.app')

@section('title', 'Edit Profil Masjid')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profil Masjid</h3>
                    <a href="/profil" class="btn btn-secondary btn-sm float-end">Kembali ke Profil</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profil.update') }}">
                        @csrf
                        
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5>Hero Section</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="hero_title" class="form-label">Judul Hero</label>
                                    <input type="text" class="form-control" id="hero_title" name="hero_title" value="{{ $profile->hero_title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="hero_subtitle" class="form-label">Subtitle Hero</label>
                                    <textarea class="form-control" id="hero_subtitle" name="hero_subtitle" rows="2">{{ $profile->hero_subtitle }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-success text-white">
                                <h5>Tentang Masjid</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="about_text" class="form-label">Teks Tentang Masjid</label>
                                    <textarea class="form-control" id="about_text" name="about_text" rows="5" required>{{ $profile->about_text }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-info text-white">
                                <h5>Visi & Misi</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="vision" class="form-label">Visi</label>
                                    <textarea class="form-control" id="vision" name="vision" rows="3" required>{{ $profile->vision }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="mission" class="form-label">Misi (satu per baris)</label>
                                    <textarea class="form-control" id="mission" name="mission" rows="4" required>{{ implode("\n", $profile->mission) }}</textarea>
                                    <small class="text-muted">Tulis setiap poin misi dalam baris terpisah</small>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-warning text-white">
                                <h5>Statistik</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="capacity" class="form-label">Kapasitas Jamaah</label>
                                            <input type="text" class="form-control" id="capacity" name="capacity" value="{{ $profile->capacity }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="established_year" class="form-label">Tahun Peresmian</label>
                                            <input type="text" class="form-control" id="established_year" name="established_year" value="{{ $profile->established_year }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="activities" class="form-label">Kegiatan Rutin</label>
                                            <input type="text" class="form-control" id="activities" name="activities" value="{{ $profile->activities }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="public_access" class="form-label">Untuk Umum</label>
                                            <input type="text" class="form-control" id="public_access" name="public_access" value="{{ $profile->public_access }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-danger text-white">
                                <h5>Lokasi & Kontak</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ $profile->address }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="google_maps_url" class="form-label">Google Maps URL</label>
                                    <input type="text" class="form-control" id="google_maps_url" name="google_maps_url" value="{{ $profile->google_maps_url }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="whatsapp_number" class="form-label">Nomor WhatsApp</label>
                                    <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $profile->whatsapp_number }}" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profil</button>
                        <a href="/profil" class="btn btn-secondary">Lihat Profil</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection