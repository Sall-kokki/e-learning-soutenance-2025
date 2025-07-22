@extends('layouts.app')

@section('content')
<style>
    body {
    background: linear-gradient(135deg, #fffbe6, #f7f7f7);
    background-attachment: fixed;
}

    body {
        background-color: #f0f0f0;
    }

    .video-container {
        max-width: 1200px;
        margin: auto;
        padding: 30px 15px;
    }

    .video-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .video-header h2 {
        font-size: 28px;
        font-weight: bold;
        color: #222;
        border-left: 6px solid #f1c40f;
        padding-left: 15px;
    }

    .btn-add-video {
        background: #f1c40f;
        color: #000;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-weight: bold;
    }

    .btn-add-video:hover {
        background: #d4ac0d;
        color: #fff;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }

    .video-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        padding: 20px;
        position: relative;
        transition: transform 0.2s ease;
    }

    .video-card:hover {
        transform: translateY(-5px);
    }

    .video-title {
        font-size: 18px;
        font-weight: 600;
        color: #000;
        margin-bottom: 10px;
    }

    .video-actions {
        margin-top: 10px;
    }

    .btn-view,
    .btn-pdf {
        display: inline-block;
        margin-right: 8px;
        margin-top: 5px;
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .btn-view {
        background-color: #000;
        color: #fff;
    }

    .btn-view:hover {
        background-color: #333;
        color: #f1c40f;
    }

    .btn-pdf {
        background-color: #f1c40f;
        color: #000;
    }

    .btn-pdf:hover {
        background-color: #d4ac0d;
        color: #fff;
    }

    .video-description {
        font-size: 14px;
        color: #555;
        margin-top: 10px;
    }

    .no-video {
        text-align: center;
        color: #888;
        font-style: italic;
        margin-top: 50px;
    }
    body::after {
    content: "";
    position: fixed;
    bottom: -50px;
    left: -50px;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, #f1c40f33 0%, transparent 80%);
    z-index: -1;
}

</style>
<div style="margin-bottom: 20px;">
    <a href="{{ route('home') }}" class="btn-return">⬅️ Retour aux cours</a>
</div>

<div class="video-container">
    <div class="video-header">
        <h2>🎥 Vidéos du cours : {{ $course->object }}</h2>
        @if(Auth::user()->status == 1)
            <a href="{{ route('materials.create', $course->id) }}" class="btn-add-video">➕ Ajouter une vidéo</a>
        @endif
    </div>

    @if($course->materials->isEmpty())
        <p class="no-video">Aucune vidéo n’a encore été ajoutée.</p>
    @else
        <div class="video-grid">
            @foreach($course->materials as $material)
                <div class="video-card">
                    <div class="video-title">{{ $material->title }}</div>
                    <div class="video-actions">
                        <a href="{{ $material->video_url }}" target="_blank" class="btn-view">▶️ Voir la vidéo</a>
                    </div>
                    <div class="video-description">{{ $material->description }}</div>
                </div>
            @endforeach
        </div>

    @endif
</div>

<div style="text-align:center; margin-bottom: 40px;">
    <img src="https://cdn-icons-png.flaticon.com/512/811/811525.png" alt="vidéo" width="100" style="margin-bottom: 10px;">
    <p style="font-size:16px; color:#555; max-width: 600px; margin: auto;">
        Retrouvez ici toutes les ressources vidéo pédagogiques liées à votre cours <strong>{{ $course->object }}</strong>. 
        Les professeurs y publient leurs contenus pour vous accompagner pas à pas.
    </p>
</div>

@endsection
