<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function __invoke()
    {
        //dd("Aqui");
        $emailType = "mail.mensajeCorreo";
        $to_name = "Administrador Licorera La Rebaja";
        $to_email = ['juansebastianrivera@hotmail.com'];
        $subject = "Test";
        $data = array("idPedido"=>'1',"cliente"=>'1');
        Mail::send($emailType,$data,function($message) use ($subject, $to_name, $to_email)
        {
            $message->to($to_email, $to_name)->subject($subject);

            $message->from(env('MAIL_USERNAME'),'PruebaCorreo');

        });
    }
}
