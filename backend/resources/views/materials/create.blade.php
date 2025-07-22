@extends('layouts.app')

@section('content')
<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
        background-color: #f5f8fa;
    }

    .form-card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 600px;
        border-left: 8px solid #0d6efd;
    }

    h2 {
        color: #0d6efd;
        text-align: center;
        margin-bottom: 25px;
    }

    label {
        font-weight: bold;
        color: #343a40;
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        width: 100%;
    }

    .alert-success {
        text-align: center;
    }
</style>
<div style="margin-bottom: 20px;">
    <a href="{{ route('home') }}" class="btn-return">⬅️ Retour aux cours</a>
</div>
<div class="form-container">
    <div class="form-card">
        <h2>Ajouter une vidéo au cours : {{ $course->object }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('materials.store') }}" method="POST">
            @csrf

            <input type="hidden" name="course_id" value="{{ $course->id }}">

            <div class="form-group mb-3">
                <label for="title">Titre de la vidéo</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description (facultatif)</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="video_url">URL de la vidéo</label>
                <input type="url" name="video_url" id="video_url" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer la vidéo</button>
        </form>
    </div>
</div>
@endsection
