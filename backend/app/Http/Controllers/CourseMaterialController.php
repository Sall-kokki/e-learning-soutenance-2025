<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseMaterial;
use Illuminate\Http\Request;

class CourseMaterialController extends Controller
{
    // Afficher toutes les vidéos d’un cours
    public function index($course_id)
    {
        $course = Course::findOrFail($course_id);
        $materials = CourseMaterial::where('course_id', $course_id)->get();

        return view('materials.index', compact('course', 'materials'));
    }

    // Afficher le formulaire pour ajouter une vidéo
    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('materials.create', compact('course'));
    }

    // Enregistrer une vidéo en base de données
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|integer',
            'title' => 'required',
            'video_url' => 'required|url'
        ]);

        CourseMaterial::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => 'video',
            'video_url' => $request->video_url
        ]);

        return redirect()->route('materials.index', $request->course_id)->with('success', 'Vidéo ajoutée avec succès');
        
    }
    // CourseMaterialController.php

public function uploadPdfForm($course_id)
{
    $course = Course::findOrFail($course_id);
    return view('materials.upload_pdf', compact('course'));
}

public function storePdf(Request $request)
{
    $request->validate([
        'course_id' => 'required|integer',
        'title' => 'required|string',
        'pdf_file' => 'required|mimes:pdf|max:2048',
    ]);

    $file = $request->file('pdf_file');
    $path = $file->store('materials/pdf', 'public');

    CourseMaterial::create([
        'course_id' => $request->course_id,
        'title' => $request->title,
        'description' => $request->description,
        'type' => 'pdf',
        'file_path' => $path
    ]);

    return redirect()->back()->with('success', 'PDF ajouté avec succès');
}
public function createPdf($course_id)
{
    $course = Course::findOrFail($course_id);
    return view('materials.create_pdf', compact('course'));
}
public function myVideos()
{
    $user = auth()->user();

    // Récupère les cours validés
    $courses = $user->courses()->wherePivot('access', 1)->get();

    $videos = [];

    foreach ($courses as $course) {
        $courseVideos = $course->materials()->where('type', 'video')->get();
        $videos[$course->id] = $courseVideos;
    }

    return view('student.my_videos', compact('courses', 'videos'));
}


}
