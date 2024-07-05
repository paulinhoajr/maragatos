<?php

namespace App\Http\Controllers;

use App\Classes\BackupDatabase;
use App\Classes\Captcha;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    private $captcha;

    public function __construct(Captcha $captcha) {
        $this->captcha = $captcha;
    }

    public function inicial() {
        $sliders = Slider::all();
        return view('site.inicial', [
            'sliders' => $sliders
        ]);
    }

    public function contato() {
        return view('site.contato');

    }

    public function enviar_email(Request $request) {
        $this->validate($request, [
            'g-recaptcha-response' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);


        $retorno = $this->captcha->getCaptcha($request['g-recaptcha-response']);

        if ($retorno->success == true && $retorno->score > 0.5)
        {
            try {

                Mail::send('layouts.contact', ['dados' => $request], function ($m) use ($request) {
                    $m->from("site@voope.com.br", "Contato Site");
                    $m->to("claus@voope.com.br", "Contato Site");
                    // $m->replyTo($request->email, $request->name);
                    $m->subject('Site - Contato: ' . $request->name);
                });

                return redirect()->back()->with('success', 'Contato enviado com sucesso !');

            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Contato não enviado !' .$e->getMessage());
            }

        }else{
            return redirect()->back()->with('flash_message_error', 'Você é um robô ou este formulário já foi enviado !');

        }
    }

    public function sobre() {
        return view('site.sobre');
    }

    public function backupDatabase() {
        $backupDb = new BackupDatabase();
        $backupDb->handle();
    }
}
