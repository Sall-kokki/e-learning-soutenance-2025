@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un PDF pour le cours : {{ $course->object }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('materials.pdf.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="course_id" value="{{ $course->id }}">

    <label for="title">Titre</label>
    <input type="text" name="title" required>

    <label for="description">Description</label>
    <textarea name="description"></textarea>

    <label for="pdf_file">Fichier PDF</label>
    <input type="file" name="pdf_file" required>

    <button type="submit">Uploader le PDF</button>
</form>

</div>
@endsection
