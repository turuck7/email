<?php

namespace Turuck7\TeiEmails;

use Illuminate\Support\Facades\Http;

class Email
{
    // Enviamos la información a Dimension TEI para enviar el correo
    public function send($data, $uuid)
    {
        // Enviamos una solicitud a Dimension TEI de que se ha enviado un email/sms
        $request = Http::post('https://dtei.test/api-tei/v1/notification/email/send', [
            'customer' => [
                'uuid'         => $uuid,
                'notification' => $data
            ],
        ]);
        return response()->json($request->json(), $request->getStatusCode());
    }
}