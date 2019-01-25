<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth,Mail;
use Socialite;

class SocialController extends Controller
{
    //
    public function redirect(){
      return Socialite::driver('facebook')->redirect();
    }

    public function callback(Request $request){

      if ($request->has('error')) {
            return redirect('/login');
      }else{
        $userSocial = Socialite::driver('facebook')->user();

        $findUser = User::where('email',$userSocial->email)->first();
        if($findUser){
          if($findUser->registerType == "socialite"){
            Auth::login($findUser);
            return redirect('/user');
          }else{
            \Session::flash('error_message','Informacion ya registrada! Intentalo nuevamente..');
             return redirect('login');
          }
        }else{

          $imgProfile = array('img_profile' => 'none');
          $user = new User;
          $user->name = $userSocial->name;
          $user->userType = 'user';
          $user->country = "Colombia";
          $user->registerDate = date('Y-m-d');
          $user->imageProfile = json_encode($imgProfile);
          $user->registerType = "socialite";
          $user->username = strtoupper($user->name);
          $user->email = $userSocial->email;
          $user->password = bcrypt(12345);
          $user->save();

          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'user';
          $userVeterinary->userId = $user->id;
          $userVeterinary->headquarterId = 1;
          $userVeterinary->save();


          $result = array(
            'email' => $userSocial->email,
            'name' => $userSocial->name,
            'username' => 'Facebook - Perfil '.$userSocial->name,
            'password' => 'Autenticacion con Facebook'
          );

          if(!empty($result['email'])){
            $email = $result['email'];
            Mail::send('layouts.emails.welcome', $result, function($message) use($email){
                $message->to($email)->subject('Identipet - Mensajes');
            });
            \Session::flash('success_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');

            return redirect('/login');

          }else{
            \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
            return redirect('/login');
          }


          Auth::login($user);
          return redirect('/user');
          }
      }




    }

    public function redirectGoogle(){
      return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle(Request $request){

      if ($request->has('error')) {
        \Session::flash('error_message','Datos Incorrectos! Intentalo nuevamente..');
         return redirect('login');
      }else{

        $socialite = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('email',$socialite->getEmail())->first();
        if($findUser){
          if($findUser->registerType == "socialite"){
            Auth::login($findUser);
            return redirect('/user');
          }else{
            \Session::flash('error_message','Informacion ya registrada! Intentalo nuevamente..');
             return redirect('login');
          }

        }else{

          $imgProfile = array('img_profile' => 'none');
          $user = new User;
          $user->name = $socialite->getName();
          $user->userType = 'user';
          $user->country = "Colombia";
          $user->registerType = "socialite";
          $user->registerDate = date('Y-m-d');
          $user->imageProfile = json_encode($imgProfile);
          $user->username = strtoupper($socialite->getName());
          $user->email = $socialite->getEmail();
          $user->password = bcrypt(12345);
          $user->save();

          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'user';
          $userVeterinary->userId = $user->id;
          $userVeterinary->headquarterId = 1;
          $userVeterinary->save();

          $result = array(
            'email' => $socialite->getEmail(),
            'name' => $socialite->getName(),
            'username' => 'Google - Perfil '.$socialite->getName(),
            'password' => 'Autenticacion con Google'
          );

          if(!empty($result['email'])){
            $email = $result['email'];
            Mail::send('layouts.emails.welcome', $result, function($message) use($email){
                $message->to($email)->subject('Identipet - Mensajes');
            });
            \Session::flash('success_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');

            return redirect('/login');

          }else{
            \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
            return redirect('/login');
          }

          Auth::login($user);
          return redirect('/user');
          }
      }



      }
    }
