<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    // Modèles disponibles chez Groq
    private const MODEL = 'llama-3.3-70b-versatile';

    public function ask(string $question, $user)
    {
        $role = $user->getRoleNames()->first();

        $systemPrompt = "
Tu es ImmoBot, l'assistant intelligent de la plateforme ImmoLink.

Tu échanges naturellement avec les utilisateurs.

Tu peux répondre normalement aux salutations, remercier les utilisateurs et avoir une conversation courtoise.

Ensuite, tu aides les utilisateurs concernant :

- la recherche de logements ;
- les annonces immobilières ;
- les contrats de bail ;
- les demandes de location ;
- la messagerie ;
- les litiges ;
- les huissiers ;
- les paiements ;
- toutes les fonctionnalités de la plateforme ImmoLink.

Le rôle de l'utilisateur est : {$role}.

Adapte tes réponses à son rôle.

- Locataire : aide à trouver un logement, gérer les contrats et les demandes.
- Bailleur : aide à publier et gérer les annonces, contrats et demandes.
- Huissier : aide à gérer les litiges et les rapports.
- Administrateur : aide à administrer la plateforme.

Sois professionnel, amical, précis et concis.
Réponds UNIQUEMENT en français.

Si une question est totalement étrangère à ImmoLink (par exemple médecine, politique, programmation, cuisine, etc.), réponds poliment que tu es spécialisé dans l'assistance de la plateforme ImmoLink et invite l'utilisateur à poser une question liée à celle-ci.
";

        // Corps de la requête (Identique à votre logique Flutter)
        $payload = [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $systemPrompt,
                ],
                [
                    'role' => 'user',
                    'content' => $question,
                ]
            ],
            'model' => self::MODEL, // ou config('services.groq.model')
            'temperature' => 0.3,
            'max_tokens' => 8192,
            'top_p' => 0.8,
            'stream' => false,
        ];

        // Envoi de la requête
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.groq.api_key'),
            'Content-Type' => 'application/json',
        ])->post(
            'https://api.groq.com/openai/v1/chat/completions',
            $payload
        );

        // Gestion des erreurs HTTP
        if (! $response->successful()) {
            // Log d'erreur utile pour le débogage (vous pouvez le commenter en prod)
            \Log::error('Erreur API Groq', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            
            return "Désolé, impossible de contacter l'assistant IA pour le moment. (Erreur : " . $response->status() . ")";
        }

        $data = $response->json();

        // Extraction de la réponse (Identique à votre logique Flutter)
        return $data['choices'][0]['message']['content'] 
            ?? "Je n'ai pas pu générer une réponse appropriée.";
    }
}