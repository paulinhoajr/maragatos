<?php

namespace App\Classes;


class Captcha
{
    public function getCaptcha($SecretKey)
    {
        $Resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".env('CAPTCHA_SECRET')."&response={$SecretKey}");
        $Retorno=json_decode($Resposta);
        return $Retorno;
    }
}
