<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'recipient' => 'required|email',
            'content' => 'required|string',
            'sender_email' => 'required|email',
            'sender_name' => 'required|string'
        ]);

        $recipient = $request->input('recipient');
        $content = $request->input('content');
        $senderEmail = $request->input('sender_email');
        $senderName = $request->input('sender_name');
        Log::info("Sender Email: $senderEmail");
        Log::info("Sender Name: $senderName");
        // Configurar los datos del correo
        $details = [
            'title' => 'Correo de prueba',
            'body' => $content
        ];

        try{
        // Enviar el correo
        Mail::send('emails.test', $details, function($message) use ($recipient, $senderEmail, $senderName) {
            $message->to($recipient)
            ->subject('Correo de prueba 23')
            ->from('test@chambajuvenil.gob.ve', $senderName);
        });


    } catch (\Exception $e) {
        Log::error('Error al enviar correo: ' . $e->getMessage());
        return response()->json(['error' => 'No se pudo enviar el correo'], 500);
    }
        return response()->json(['message' => 'Correo enviado con éxito']);
    }
}
