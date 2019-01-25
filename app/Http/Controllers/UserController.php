<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,DB,Validator,Crypt,Mail,Image,PDF,Mailgun;
use App\Http\Requests;
use App\User,App\Code,App\ClinicHistory,App\MedicalAppointment,App\Email,App\Headquarter;
use App\Pet;
use App\SearchPet;
use App\Vaccine;
use App\SearchHistory;
use App\OwnerPet;
use App\PetSuscription;
use App\Session;
use App\Characteristic;


class UserController extends Controller
{

  public function register(){
    return view('auth.register');
  }
  public function getHeadquarter(){
    $user = Auth::user();
    $headquarterVeterinary = \App\UserVeterinary::where('userId','=',$user->id)->first();
    $headquarter = Headquarter::find($headquarterVeterinary->headquarterId);
    return $headquarter;
  }

  public function login(){
    if(Auth::user()){
      $userType = Auth::user()->userType;
      if($userType == "user"){
          return redirect("/user");
      }else if($userType == "super-admin"){
          return redirect("/control");
      }else if($userType == "admin"){
          return redirect("/administrator");
      }else{
          return view('auth.login');
      }
    }else{
      return view('auth.login');
    }



  }
  public function createUser(Request $request){
          date_default_timezone_set("America/Bogota");
          $validator = Validator::make($request->all(), [
              'name' => 'required|string|max:255',
              'lastName' => 'required|string|max:255',
              'email' => 'required|email|max:255',
              'username' => 'required|string|max:255',
              'password' => 'required|max:255'
          ]);
          if ($validator->fails()) {
              return redirect('/register')->withErrors($validator)->withInput();
          }

          $imgProfile = array('img_profile' => 'none');

          $email = strtolower($request->email);
          //Save administrator
          $client = new User;
          $client->userType = 'user';
          $client->name = $request->name;
          $client->lastName = $request->lastName;
          $client->email = $email;
          $phonesData = array(
            'phone' => $request->phone,
          );
          $client->phones = json_encode($phonesData);
          $client->registerDate = date('Y-m-d');
          $client->city = $request->ciudad;
          $client->username = $request->username;
          $client->registerType = "identipet";
          $client->imageProfile = json_encode($imgProfile);
          $client->password = bcrypt($request->password);
          $client->save();
          //Save as admin
          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'user';
          $userVeterinary->userId = $client->id;
          $userVeterinary->headquarterId = 1;
          $userVeterinary->save();

          $result = array(
            'email' => $email,
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password
          );

          if(!empty($result['email'])){
            $email = $result['email'];
            Mail::send('layouts.emails.welcome', $result, function($message) use($email){
                //$message->dkim(true);
                $message->to($email)->subject('Identipet - Mensajes');
            });
            \Session::flash('success_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');

            return redirect('/login');

          }else{
            \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
            return redirect('/login');
          }


  }

  public function dataAccess(){
      return view('auth.login');
  }
  public function petDelete(Request $request){
    $pet = Pet::find($request->petId);
    $user = Auth::user();
    //Search Pets
      $ownersPets = OwnerPet::where('petId',$request->petId)->get();
      //Search Pet to Delete
      foreach($ownersPets as $op){
          //Search Pet Delete
          $searchPets = SearchPet::where('petId',$op->petId)->get();
          foreach($searchPets as $sp){
              DB::table('SearchHistories')->where('id', '=', $sp->searchPetId)->delete();
          }
          //Delete Search Pets
          DB::table('SearchPets')->where('petId', '=', $op->petId)->delete();
          //Delete Pet Suscription
          DB::table('PetsSuscriptions')->where('petId', '=', $op->petId)->delete();
          //Search to Delete Codes
          $petSuscriptions = PetSuscription::where('petId',$op->petId)->get();
          foreach($petSuscriptions as $ps){
            DB::table('Codes')->where('id', '=', $ps->codeId)->delete();
          }
          //Delete Medical Appointments
          DB::table('MedicalAppointments')->where('petId', '=', $op->petId)->delete();
          //Delete Pets
          DB::table('Pets')->where('id', '=', $pet->id)->delete();
      }
      //Delete User
      return redirect('/user');
  }


  public function deleteUser(Request $request){
    $user = User::find($request->userId);
    //Search Pets
      $ownersPets = OwnerPet::where('userId',$user->id)->get();
      //Search Pet to Delete
      foreach($ownersPets as $op){
          //Search Pet Delete
          $searchPets = SearchPet::where('petId',$op->petId)->get();
          foreach($searchPets as $sp){
              DB::table('SearchHistories')->where('id', '=', $sp->searchPetId)->delete();
          }
          //Delete Search Pets
          DB::table('SearchPets')->where('petId', '=', $op->petId)->delete();
          //Delete Pet Suscription
          DB::table('PetsSuscriptions')->where('petId', '=', $op->petId)->delete();
          //Search to Delete Codes
          $petSuscriptions = PetSuscription::where('petId',$op->petId)->get();
          foreach($petSuscriptions as $ps){
            DB::table('Codes')->where('petId', '=', $ps->petId)->delete();
          }
          //Delete Medical Appointments
          DB::table('MedicalAppointments')->where('petId', '=', $op->petId)->delete();
          //Delete Pets
          DB::table('Pets')->where('id', '=', $op->petId)->delete();
      }
      //Delete Owners Pets By User Id
      DB::table('OwnersPets')->where('userId', '=', $user->id)->delete();
      // Delete Users Veterinarians
      DB::table('UsersVeterinarians')->where('userId', '=', $user->id)->delete();
      //Delete User
      User::destroy($user->id);
      return redirect('/login');
    }
  public function editUser(){
      $user = Auth::user();
      return view('admin.user.editUser')->with('user', $user);
  }

  public function updateUser(Request $request){


    date_default_timezone_set("America/Bogota");
    //Save imageProfile


    //Save administrator
    $client = User::find($request->userId);
    $client->userType = 'user';
    $client->identification = $request->identification;
    $client->name = $request->name;
    $client->lastName = $request->lastName;
    if($client->registerType != "socialite"){
      $client->email = $request->email;
    }

    $client->country = $request->country;
    $client->city = $request->city;
    $phonesData = array(
      'phone' => $request->phone,
    );
    $phones  = json_encode($phonesData);
    $client->phones = $phones;
    $client->address = $request->address;

    if($request->image){
       $image = $request->image;
       $filename  = time().'.'.$image->getClientOriginalExtension();
       $path = public_path('uploads/images/'.$filename);
       Image::make($image->getRealPath())->resize(400, 400)->save($path);
       $imgProfile = array('img_profile' => $filename);

       $image  = json_encode($imgProfile);
       $client->imageProfile = $image;
    }
    if($request->password){
      if($client->registerType != "socialite"){
        $client->password = bcrypt($request->password);
      }

    }

    $client->save();

    return redirect('/user/profile');

  }


  public function validateUsername(Request $request){
      if(!empty($request->username)){
          $username = trim($request->username);
          $count = User::where('username', '=', $username)->count();
          if ($count == 0):
              return "true";
          else:
              return "false";
          endif;
      } else {
          return "false";
      }
  }

  public function validateEmail(Request $request){

    if(!empty($request->email)){
        $email = trim($request->email);
        $count = User::where('email', '=', $email)->count();
        if ($count == 0):
            return "true";
        else:
            return "false";
        endif;
    } else {
        return "false";
    }
  }

  public function validateUsernameFormContainer(Request $request){

      if(!empty($request->username)){
          $username = trim($request->username);
          $count = User::where('username', '=', $username)->count();
          if ($count == 0):
              $value =json_encode(array('valid' => true));
          else:
              $value =json_encode(array('valid' => false));
          endif;
      } else {
              $value =json_encode(array('valid' => false));
      }
      return $value;
  }

  public function validateEmailFormContainer(Request $request){

    if(!empty($request->email)){
        $email = trim($request->email);
        $count = User::where('email', '=', $email)->count();
        if ($count == 0):
          $value =json_encode(array('valid' => true));
        else:
          $value =json_encode(array('valid' => false));
        endif;
    } else {
        $value =json_encode(array('valid' => false));
    }

    return $value;
  }

  public function validateCodeFormContainer(Request $request){

    $hq = $this->getHeadquarter();
    if(!empty($request->codePet)){
        $code = trim($request->codePet);
        $count = Code::where('codes', '=', $code)
        ->where('headquarterId', '=', $hq->id)
        ->where('status', '=', false)
        ->count();
        if ($count == 0):
          $value =json_encode(array('valid' => false));
        else:
          $value =json_encode(array('valid' => true));
        endif;
    } else {
        $value =json_encode(array('valid' => true));
    }

    return $value;
  }



  public function getCodeByPet($petId){
    $code = new Code();
    $codeData = $code->getCodeByPet($petId);
    return $codeData;
  }

  public function reportFound($code){
    //Search pet
    $pet = DB::table('Pets as p')
        ->join('PetsSuscriptions as ps', 'p.id', '=', 'ps.petId')
        ->join('Codes as c', 'c.id', '=', 'ps.codeId')
        ->select('p.*','c.codes')
        ->where('c.codes','=',$code)
        ->get();

    foreach ($pet as $p) {
      $petId = $p->id;
    }

    $users = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'op.userId', '=', 'u.id')
        ->select('u.*')
        ->where('pet.id','=',$petId)
        ->get();

    return view('admin.search.index')->with('pet',$pet)->with('users',$users);

  }

  public function thanks(){
    //Search pet
    return view('admin.search.thanks');
  }

  public function viewReport(){
    return view('admin.search.report');
  }

  public function reportCode(Request $request){

    $validator = Validator::make($request->all(), ['code' => 'required']);
    if ($validator->fails()) {
        return redirect('search')->withErrors($validator)->withInput();
    }

    $code = $request->code;
    $codeExist = DB::table('Codes as c')
        ->select('c.id')
        ->where('c.codes','=',$code)
        ->where('c.status','=',TRUE)
        ->count();

    if($codeExist == 1){
      return redirect('search/'.$code);
    }else{
      \Session::flash('error_message','Datos Incorrectos! Intentalo nuevamente..');
      return redirect('search');

    }


  }

  public function saveReport($code, Request $request){

      date_default_timezone_set("America/Bogota");
      $validator = Validator::make($request->all(), ['description' => 'required']);
      if ($validator->fails()) {
          return redirect('search/'.$code)->withErrors($validator)->withInput();
      }

      //Get pet and User By Code
      $resultSet = DB::table('users as u')
          ->join('OwnersPets as op', 'u.id', '=', 'op.userId')
          ->join('Pets as p', 'p.id', '=', 'op.petId')
          ->join('PetsSuscriptions as ps', 'p.id', '=', 'ps.petId')
          ->join('Codes as c', 'c.id', '=', 'ps.codeId')
          ->select('u.*','c.codes','p.name as petName','p.id as petId','p.imageProfile')
          ->where('c.codes','=',$code)
          ->get();


      foreach($resultSet as $q){

          $image = json_decode($q->imageProfile);
          $result = array(
            'email' => $q->email,
            'name' => $q->name,
            'petName' => $q->petName,
            'imageProfile' => $image->img_profile,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'description' => $request->description
          );
          $petId = $q->petId;
      }

      $locationData = array(
        'latitud' => $request->latitud,
        'longitud' => $request->longitud,
      );
      $location  = json_encode($locationData);

      //Search Report
      $searchPets = SearchPet::where('petId','=',$petId)->where('status','=','2')->first();
      //Create Report
      if ($searchPets != ""){
        $searchHistory = new SearchHistory;
        $searchHistory->searchPetId = $searchPets->id;
        $searchHistory->notify = TRUE;
        $searchHistory->location = $location;
        $searchHistory->date = date('Y-m-d');
        $searchHistory->description = $request->description;
        $searchHistory->save();

        $email = $result['email'];

        if(!empty($result['email'])){
          Mail::send('layouts.emails.found', $result, function($message) use($email){
              $message->to($email)->subject('Identipet - Mensajes');
          });
          \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
          return redirect('/agradecimiento');

        }else{
          \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
          return redirect('/agradecimiento');
        }
      }else {

        $email = $result['email'];

        if(!empty($result['email'])){
              Mail::send('layouts.emails.found', $result, function($message) use($email){
              $message->to($email)->subject('Identipet - Mensajes');
          });
          \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
          return redirect('/agradecimiento');

        }else{
          \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
          return redirect('/agradecimiento');
        }
      }

  }

  public function historySearchByPetId($petId){

    $id = Crypt::decrypt($petId);
    $histories = DB::table('SearchHistories as sh')
        ->join('SearchPets as sp', 'sh.searchPetId', '=', 'sp.id')
        ->select('sh.*')
        ->where('sp.petId','=',$id)
        ->get();

    $searchInfo = SearchPet::where('petId',$id)->get();
    $pet = Pet::find($id);

    return view('admin.user.pets.history')
                ->with('searchInfo',$searchInfo)
                ->with('histories',$histories)
                ->with('pet',$pet);

  }

  public function dashboard(){
    $user = Auth::user();
    $nameUser = $user->name.' '.$user->lastName;
    session(['nameVeterinary' => $nameUser]);

    $pets_count = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->select('pet.*')
      ->where('u.id','=',$user->id)
      ->count();
    if($pets_count == 0){
      return redirect('/user/pets');
    }
    $pets = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->select('pet.*')
      ->where('u.id','=',$user->id)
      ->get();
    $activePets = DB::table('Pets as p')
        ->join('OwnersPets as op', 'p.id', '=', 'op.petId')
        ->select('p.*')
        ->where('op.userId','=',$user->id)
        ->where('p.petStatus','=',1)
        ->get();
    $reportPets = DB::table('Pets as p')
        ->join('OwnersPets as op', 'p.id', '=', 'op.petId')
        ->select('p.*')
        ->where('op.userId','=',$user->id)
        ->where('p.petStatus','=',2)
        ->get();
    $veterinarians = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
          ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('v.name','v.url','h.address','h.email','h.principal','h.phone as movil','h.city','h.nameHeadquarter as nameHeadquarter')
          ->where('u.id','=',$user->id)
          ->get();

    $user = User::find($user->id);

    return view('admin.user.dashboard')
                ->with('user',$user)
                ->with('veterinarians',$veterinarians)
                ->with('pets',$pets)
                ->with('reportPets',$reportPets)
                ->with('activePets',$activePets)
                ->with('characteristic',new Characteristic())
                ->with('code',new Code());

  }
  public function addPet(){
      return view('admin.user.pets.add');
  }

  public function editPet($petId){
      $id = Crypt::decrypt($petId);
      $pet = Pet::find($id);

      $codes = DB::table('Pets as pet')
          ->join('PetsSuscriptions as ps', 'pet.id', '=', 'ps.petId')
          ->join('Codes as c', 'ps.codeId', '=', 'c.id')
          ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('c.*')
          ->where('pet.id','=',$pet->id)
          ->where('c.status','=',TRUE)
          ->count();
      if($codes > 0){
        $codes_data = DB::table('Pets as pet')
            ->join('PetsSuscriptions as ps', 'pet.id', '=', 'ps.petId')
            ->join('Codes as c', 'ps.codeId', '=', 'c.id')
            ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
            ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('c.*')
            ->where('pet.id','=',$pet->id)
            ->where('c.status','=',TRUE)
            ->get();
        foreach($codes_data as $cd){
          $code_value = $cd->codes;
          }
        }else{
          $code_value = 0;
        }

      return view('admin.user.pets.edit')->with('pet',$pet)->with('code_value',$code_value);
  }
  public function requestsCodes(Request $request){
      $id = $request->petId;
      $pet = Pet::find($id);
      $pet->petRequest = TRUE;
      $pet->save();
      return redirect('user/pets');

  }
  public function updatePet(Request $request){
    date_default_timezone_set("America/Bogota");
    $petId = Crypt::decrypt($request->_id);

    $tipo = $request->petType;
    if($tipo == 1){
      //Canino
      $color = $request->color_canine;
      $medida = $request->medida_canine;
      $raza = $request->raza;
    }else if($tipo == 2){
      //Felino
      $color = $request->color_feline;
      $medida = $request->medida_feline;
      $raza = $request->raza;
    }else{
      $color = $request->color;
      $medida = $request->medida;
      $raza = $request->raza_otro;
    }
    $data = array(
      'raza' => $raza,
      'color' => $color,
      'medida' => $medida,
    );

    $characteristics  = json_encode($data);

    //Save imageProfile


    $pet = Pet::find($petId);
    $pet->petType = $request->petType;
    $pet->petStatus = 1; //1 = Active | 2 = Lost
    $pet->searchPetId = 0;
    if($request->codePet){
      $pet->haveCode = true;
      $pet->activeCode = true;
    }
    if($request->image){
      $imageprofilepet = json_decode($pet->imageProfile);
          if($request->image){
             $image = $request->image;
             $filename  = time().'.'.$image->getClientOriginalExtension();
             $path = public_path('uploads/images/'.$filename);
             Image::make($image->getRealPath())->resize(400, 400)->save($path);
             $imgProfile = array('img_profile' => $filename);
          }else{
             $imgProfile = array('img_profile' => 'none');
          }
      $pet->imageProfile = json_encode($imgProfile);
    }

    $pet->name = $request->namePet;
    $pet->gender = $request->gender;
    $pet->characteristics = $characteristics;
    $pet->save();

    if($request->codePet){

        $codeQuery = \App\Code::where('codes',$request->codePet)->get();
        foreach ($codeQuery as $codeResult) {
          $codeId = $codeResult->id;
        }
        $petSuscription = new \App\PetSuscription;
        $petSuscription->petId = $pet->id;
        $petSuscription->codeId = $codeId;
        $petSuscription->suscriptionType = 'veterinary';
        $petSuscription->suscriptionDate = date('Y-m-d');
        $petSuscription->belongsVeterinary = true;
        $petSuscription->save();
        //Update Status code
        $codeUpdate = \App\Code::find($codeId);
        $codeUpdate->status = TRUE;
        $codeUpdate->save();

        $petUpdate = \App\Pet::find($pet->id);
        $petUpdate->haveCode = true;
        $petUpdate->activeCode =true;
        $petUpdate->save();
    }

    return redirect('user');
  }

  public function getClinicHistory($id){
      $clinicHistory = ClinicHistory::find($id);
      return $clinicHistory;
  }

  public function profile(){
    $user = Auth::user();

    $pets = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->select('pet.*')
      ->where('u.id','=',$user->id)
      ->get();
    $user = User::find($user->id);
    return view('admin.user.profile')
                ->with('user',$user)
                ->with('pets',$pets);
  }

  public function cancelappointment(Request $request){

    $appointment = MedicalAppointment::find($request->idAppointment);
    $appointment->status = 'Cancelada';
    $appointment->save();

    $users = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'op.userId', '=', 'u.id')
        ->select('u.name as user','u.email as email','u.identification as id','pet.name as namePet')
        ->where('pet.id','=',$appointment->petId)
        ->get();
    $Headquarter = Headquarter::find($appointment->headquarterId);
        foreach ($users as $user ){
            $pet = $user->namePet;
            $client = $user->user;
        }
        $email = $Headquarter->email;
        $dateTime = $appointment->dateTime;
        $result = array(
          'fecha' => $dateTime,
          'email' => $email,
          'pet' => $pet,
          'client' => $client
        );


        if(!empty($result['email'])){
          $email = $result['email'];
          Mail::send('layouts.emails.cancel', $result, function($message) use($email){
              $message->to($email)->subject('Identipet - Cita Medica-Cancelada');
          });
          \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
          return redirect('user/appointments');

        }else{
          \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
          return redirect('user/appointments');
        }
  }
  public function appointment(){

    //Get Headquarter Id
    $user = Auth::user();

    $appointments = DB::table('MedicalAppointments as ma')
        ->join('Pets as pet', 'ma.petId', '=', 'pet.id')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'op.userId', '=', 'u.id')
        ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
        ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
        ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
        ->select('u.name as user','u.identification as id','pet.name as namePet','ma.dateTime as dateAppointment','ma.status','ma.id as idAppointment')
        ->where('u.id','=',$user->id)
        ->get();

      return view('admin.user.appointment')->with('appointments',$appointments);

  }

  public function reportHc($option, $id){
    $idHc = Crypt::decrypt($id);
    $clinicHistory = ClinicHistory::find($idHc);
    $pet = Pet::find($clinicHistory->petId);
    view()->share('pet',$pet);
    view()->share('clinicHistory',$clinicHistory);
    $pdf = PDF::loadView('admin.user.report.index');
    return $pdf->download('Historia-'.$pet->name.'.pdf');
  }

  public function reportVaccines($option, $id){
    $idVaccine = Crypt::decrypt($id);
    $vaccine = Vaccine::find($idVaccine);
    $pet = Pet::find($vaccine->petId);
    view()->share('pet',$pet);
    view()->share('vaccine',$vaccine);
    $pdf = PDF::loadView('admin.user.report.vaccine');
    return $pdf->download('vacunas-'.$pet->name.'.pdf');
    //return view('admin.user.report.vaccine')->with('vaccine',$vaccine)->with('pet',$pet);
  //  return $idVaccine;
  }


  public function getVaccines($idVaccine){
    $id = Crypt::decrypt($idVaccine);
    $vaccine = Vaccine::find($id);
    return $vaccine;
  }
  public function reportPet(Request $request){

    $validator = Validator::make($request->all(), [
            'petId' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('user/pets')->withErrors($validator)->withInput();
    }

    $petId = Crypt::decrypt($request->petId);

    //Create report for Pet Lost
    $searchPet = new SearchPet;
    $searchPet->petId = $petId;
    $searchPet->status = 2; //2 = Lost
    $searchPet->public = false;
    $searchPet->lossDate = date('Y-m-d');
    $searchPet->description = $request->description;
    $searchPet->save();

    //Update Status Pet to Lost
    $pet = Pet::Find($petId);
    $pet->petStatus = 2; //1 = Active | 2 = Lost
    $pet->searchPetId = $searchPet->id;
    $pet->save();


    $image = json_decode($pet->imageProfile);
    if($image->img_profile != 'none'){
      $validate = true;
      $image = $image->img_profile;
    }else{
      $validate = false;
      $image = 'none';
    }

    $result = array(
      'name' => $pet->name,
      'validate' => $validate,
      'image' =>$image
    );

    $users = User::where('userType','user')->get();
    Mail::send('layouts.emails.lost', $result, function($message) use($users){

        foreach ($users as $user) {
          $message->cc('info@identipet.co');
          $message->bcc($user->email);
        }
        $message->subject('Identipet - Mascota Perdida');
    });

    return redirect('user/pets');

  }

  public function reportPetFound(Request $request){
    $validator = Validator::make($request->all(), [
            'petId' => 'required',
            'code' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('user/pets')->withErrors($validator)->withInput();
    }

    $user = Auth::user();
    $code = $request->code;

    $resultSet = DB::table('users as u')
        ->join('OwnersPets as op', 'u.id', '=', 'op.userId')
        ->join('Pets as p', 'p.id', '=', 'op.petId')
        ->join('PetsSuscriptions as ps', 'p.id', '=', 'ps.petId')
        ->join('Codes as c', 'c.id', '=', 'ps.codeId')
        ->select('p.id ')
        ->where('c.codes','=',$code)
        ->where('u.id','=',$user->id)
        ->count();


    if($resultSet == 1){
        $petId = Crypt::decrypt($request->petId);

        $pet = Pet::Find($petId);
        $pet->petStatus = 1; //1 = Active | 2 = Lost
        $pet->save();

        $searchPet = SearchPet::find($pet->searchPetId);
        $searchPet->status = 1; //2 = Lost
        $searchPet->foundDate = date('Y-m-d');
        $searchPet->save();

        $image = json_decode($pet->imageProfile);
        if($image->img_profile != 'none'){
          $validate = true;
          $image = $image->img_profile;
        }else{
          $validate = false;
          $image = 'none';
        }

        $result = array(
          'name' => $pet->name,
          'validate' => $validate,
          'image' =>$image
        );
        $users = User::where('userType','user')->get();
        Mail::send('layouts.emails.report_found', $result, function($message) use($users){

            foreach ($users as $user) {
                $message->cc('info@identipet.co');
                $message->bcc($user->email);
            }
            $message->subject('Identipet - Mascota Encontrada');
        });

    }

    return redirect('user/pets');

  }

  public function petProfile($idProfile){
    $id = Crypt::decrypt($idProfile);
    $pet = Pet::Find($id);

    //Search Data user
    $user = DB::table('users as u')
        ->join('OwnersPets as op', 'u.id', '=', 'op.userId')
        ->join('Pets as p', 'p.id', '=', 'op.petId')
        ->select('u.*')
        ->where('op.petId','=',$pet->id)
        ->get();


    foreach($user as $u){
      $id = $u->id;
    }

    $user = User::find($id);
    //Clinic History
    $clinicHistories =  ClinicHistory::where('petId','=',$pet->id)->get();
    //Appointments
    $appointments =  MedicalAppointment::where('petId','=',$pet->id)->get();

    $vaccine = Vaccine::where('petId','=',$pet->id)->get();

    return view('admin.user.pets.profile')
                ->with('pet',$pet)
                ->with('user',$user)
                ->with('clinicHistories',$clinicHistories)
                ->with('appointments',$appointments)
                ->with('characteristic',new Characteristic())
                ->with('vaccine',$vaccine)
                ->with('code',new Code());
  }

  public function pets(){
    $user = Auth::user();
    $activePets = DB::table('Pets as p')
        ->join('OwnersPets as op', 'p.id', '=', 'op.petId')
        ->select('p.*')
        ->where('op.userId','=',$user->id)
        ->where('p.petStatus','=',1)
        ->get();

        $pets = DB::table('Pets as pet')
          ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
          ->join('users as u', 'u.id', '=', 'op.userId')
          ->select('pet.*')
          ->where('u.id','=',$user->id)
          ->get();
    $user = User::find($user->id);

    $veterinarians = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
          ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('v.name','v.url','h.address','h.email','h.principal','h.phone as movil','h.nameHeadquarter as nameHeadquarter')
          ->where('u.id','=',$user->id)
          ->get();

    $reportPets = DB::table('Pets as p')
        ->join('OwnersPets as op', 'p.id', '=', 'op.petId')
        ->select('p.*')
        ->where('op.userId','=',$user->id)
        ->where('p.petStatus','=',2)
        ->get();
      return view('admin.user.pets.index')
      ->with('activePets',$activePets)
      ->with('veterinarians',$veterinarians)
      ->with('reportPets',$reportPets)
      ->with('pets',$pets)
      ->with('user',$user)
      ->with('characteristic',new Characteristic())
      ->with('code',new Code());

  }

  public function petLost(){

  }


  public function savePet(Request $request){
    date_default_timezone_set("America/Bogota");
    $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|max:255',
            'petType' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('user/pets')->withErrors($validator)->withInput();
    }


    $tipo = $request->petType;
    if($tipo == 1){
      //Canino
      $color = $request->color_canine;
      $medida = $request->medida_canine;
      $raza = $request->raza;
    }else if($tipo == 2){
      //Felino
      $color = $request->color_feline;
      $medida = $request->medida_feline;
      $raza = $request->raza;
    }else{
      $color = $request->color;
      $medida = $request->medida;
      $raza = $request->raza_otro;
    }
    $data = array(
      'raza' => $raza,
      'color' => $color,
      'medida' => $medida,
    );

    $characteristics  = json_encode($data);

    //Save imageProfile
    if($request->image){
       $image = $request->image;
       $filename  = time().'.'.$image->getClientOriginalExtension();
       $path = public_path('uploads/images/'.$filename);
       Image::make($image->getRealPath())->resize(400, 400)->save($path);
       $imgProfile = array('img_profile' => $filename);
    }else{
       $imgProfile = array('img_profile' => 'none');
    }

    $pet = new \App\Pet;
    $pet->petType = $request->petType;
    $pet->petStatus = 1; //1 = Active | 2 = Lost
    $pet->searchPetId = 0;
    $pet->haveCode = false;
    $pet->activeCode = false;
    $pet->name = $request->name;
    $pet->age = $request->age;
    $pet->gender = $request->gender;
    $pet->imageProfile = json_encode($imgProfile);
    $pet->characteristics = $characteristics;
    $pet->save();

    $user = Auth::user();
    $ownerPet = new \App\OwnerPet;
    $ownerPet->userId = $user->id;
    $ownerPet->petId = $pet->id;
    $ownerPet->save();

    return redirect('user/pets');
  }

  public function getAppointment($id){
      $appointent = MedicalAppointment::find($id);
      return $appointent;
  }



}
