<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function show()
    {
        return view('chatbot');
    }

    public function handle(Request $request)
{
    $message = strtolower($request->input('message'));
    $response = "Désolé, je n'ai pas compris. Pouvez-vous reformuler ?";

    // Analyse par mot-clé
    if (str_contains($message, 'bonjour') || str_contains($message, 'salut')) {
        $response = "Bonjour ! Comment puis-je vous aider dans votre formation ?";
    } elseif (str_contains($message, 'merci')) {
        $response = "Avec plaisir ! 😊";
    } elseif (str_contains($message, 'cours') || str_contains($message, 'planning')) {
        $response = "Voici votre planning :\n- Lundi 10h : Français\n- Mardi 14h : Mécanique\n- Jeudi 8h : Mathématiques.";
    } elseif (str_contains($message, 'devoir') || str_contains($message, 'interrogation')) {
        $response = "Vos prochains devoirs sont disponibles dans la section Journal de classe.";
    } elseif (str_contains($message, 'contact') || str_contains($message, 'professeur')) {
        $response = "Pour contacter un professeur, allez dans votre cours et cliquez sur 'Contacter le professeur'.";
    } elseif (str_contains($message, 'aide')) {
        $response = "Je suis là pour vous aider ! Posez-moi une question précise sur vos cours ou planning.";
    }

    return response()->json(['response' => $response]);
}

}
