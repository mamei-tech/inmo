{{--TODO Arreglar esto aki que es el cuerpo del correo que c va a mandar--}}

<h4><a href="{{ route('auth.register_email_verification', [App::getLocale(), 'token' => $token]) }}">Entre en este link para verificar su cuenta.</a></h4>

