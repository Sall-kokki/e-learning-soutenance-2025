@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un document PDF au cours : {{ $course->object }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('materials.storePdf') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="course_id" value="{{ $course->id }}">

        <div class="form-group">
            <label for="title">Titre du document</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description (facultatif)</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="pdf_file">Fichier PDF</label>
            <input type="file" name="pdf_file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le document</button>
    </form>
</div>
@endsection
