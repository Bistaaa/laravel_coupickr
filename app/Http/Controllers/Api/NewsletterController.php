<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\NewsletterUser;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletter_users,email',  // Assicurati che l'email sia unica
        ]);

        // Genera un token univoco
        $token = Str::random(40);

        $subscriber = NewsletterUser::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'subscribed' => true,  // Imposta come iscritto di default
            'unsubscribe_token' => $token  // Salva il token nel database
        ]);

        return response()->json(['message' => 'Thank you for subscribing!'], 200);
    }
}
