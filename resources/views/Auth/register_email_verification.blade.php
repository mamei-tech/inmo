{{-- TODO Poner esto a funcionar con conrreo electronico  --}}

<h4><a href="{{ route('auth.register_email_verification', [App::getLocale(), 'token' => $token]) }}">Entre en este link para verificar su cuenta.</a></h4>

