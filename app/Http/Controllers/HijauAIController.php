<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HijauAIController extends Controller
{
    public function index()
    {
        $title = 'Hijau AI';
        $active = 'hijau-aiu';
        return view('hijau-ai.index', compact('active', 'title'));
    }
    public function ask(Request $request)
    {
        $prompt = $request->input('prompt', "Aku Hebat");
        $apiKey = env('GEMINI_API_KEY');

        $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$apiKey", [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ]);

        return response()->json($response->json());
    }
}