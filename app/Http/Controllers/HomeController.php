<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function getIndex(Request $request) {
        $response = Http::get('https://type.fit/api/quotes');
        $quotes = $response->json();

        // Get any random quotes- completed
        $firstQuote = $quotes[array_rand($quotes)];


        $text = $firstQuote["text"];
        $author = $firstQuote["author"];
        $res = str_replace("type.fit","", $author);

        // Remove type.fit from the author name

        return view("welcome", [
            'quote' => $text,
            'author' => $res
        ]);
    }
}
