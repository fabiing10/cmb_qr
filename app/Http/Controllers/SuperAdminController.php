<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,Validator, Input, Redirect,DB,Crypt,QrCode,Zipper, Session,File,Storage;
use Image,Mail,PDF,Excel;
use App\User,App\Pet,App\UserVeterinary,App\ClinicHistory,App\Vaccine,App\MedicalAppointment,App\Veterinary,App\Email,App\SearchPet,App\OwnerPet,App\PetSuscription,App\SearchHistory;
use App\Headquarter;
use App\Code,App\Characteristic;


class SuperAdminController extends Controller
{
    //

  public function dashboard(){
        //return view('admin.dashboard');
        return redirect('control/users');
  }

  public function addUser(){
      return view('admin.super-admin.users.create_user');
  }

  public function createUser(Request $request){

    $user = new User;
    $user->name = $request->name;
    $user->userType = 'user';
    $user->lastName = $request->lastName;
    $user->identification = $request->identification;
    $user->phone = $request->phone;
    $user->haveCode = 'false';
    $user->activeCode = 'false';
    $user->email = $request->email;
    $user->save();

    return redirect('control/users');
  }

  public function codeQR($userId){
      $userId = Crypt::decrypt($userId);

      $user = User::find($userId);

      $userIdentification = Crypt::encrypt($user->identification);

      $url = 'http://localhost:8000/event/'.$userIdentification;
      return view('admin.super-admin.codes.qr')->with('url',$url)->with('user',$user);
  }

  public function getClinicHistory($id){
    $codeId = Crypt::decrypt($id);
    $clinicHistory = ClinicHistory::find($codeId);
    return $clinicHistory;
  }

  public function generateCodesQR(){
    $directory = base_path().'/public/codes/qr/';
    //Clean Directory
    $delete = File::cleanDirectory($directory);
    //Delete Zip
    Storage::delete(base_path().'/public/codes/qr.zip');

    $path = base_path().'/public/codes/qr/';
    $users = User::where('userType','user')->get();
    foreach($users as $user){
      $identification = Crypt::encrypt($user->identification);
      $url = 'http://localhost:8000/event/'.$identification;
      QrCode::format('svg')->size(400)->generate($url, $path.$user->identification.'.svg');
    }
    $files = base_path().'/public/codes/qr/';
    Zipper::make(base_path().'/public/codes/qr.zip')->add($files)->close();

    return response()->download(base_path().'/public/codes/qr.zip');
  }

  public function reportFound($identification){

    $user = User::where('identification', $identification)->first();
    return view('admin.search.index')->with('user',$user);

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
/*
  public function codes(){
      $codes = DB::table('Codes as c')
          ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId','h.city as city','h.address as address','h.principal as principal', 'h.nameHeadquarter')
          ->orderBy('c.id', 'asc')
          ->get();

      $headquarter = $this->getHeadquarter();

      $codesAssign = DB::table('Codes as c')
          ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId','h.city as city','h.address as address','h.principal as principal', 'h.nameHeadquarter')
          ->where('h.id','!=',$headquarter->id)
          ->get();

      $veterinary = Veterinary::all();
      return view('admin.super-admin.codes.index')->with('codes',$codes)->with('codesAssign',$codesAssign)->with('veterinary',$veterinary);
    }

    //Falta validar el codigo y la sede por metodo GET

  public function getVeterinariansToAssign($code){
      $veterinary = DB::table('Veterinary as v')
          ->join('Headquarters as h', 'v.id', '=', 'h.veterinaryId')
          ->select('h.*', 'v.name', 'v.identification','v.id as veterinaryId')
          ->where('h.principal', '=', TRUE)
          ->get();
      return view('admin.super-admin.codes.assign')->with('veterinary',$veterinary)->with('code',$code);
    }

  public function assignCode($headquarterId,$codeId){

        $codeId = Crypt::decrypt($codeId);
        $headquarter = $this->getHeadquarter();
        $code = Code::find($codeId);
        $code->status = false;
        $code->headquarterId = $headquarterId;
        $code->headquarterAssign = $headquarter->headquarterId;
        $code->save();

        return redirect('control/codes');


    }

  public function deleteCode($codeId){
      $code = Crypt::decrypt($codeId);
      Code::destroy($code);
      return redirect('control/codes');
    }

  public function codeSave(Request $request){


      $validator = Validator::make($request->all(), [
              'quantity' => 'required|integer'
      ]);
      //Validation Conditional
      if ($validator->fails()) {
              /*return redirect('control/veterinary')
                          ->withErrors($validator)
                          ->withInput();*/
                          return $validator;
      }

      $quantity = $request->quantity;
      $list = $request->selectVeterinary;


      if($list == "on"){
        $veterinary = $request->veterinary;
        $headquarter = headquarter::where([['principal',true],['veterinaryId','=',$veterinary]])->first();
        if($headquarter != null){
          $headquarterId = $headquarter->id;
        }else{
          $headquarterId = 1;
        }

      }else{
        $headquarterId = 1;
      }


      for ($i=0; $i < $quantity; $i++) {
          $code = new Code;
          $newCode = $code->getCode();
          $code->codes = $newCode;
          $code->status = false;
          $code->headquarterId = $headquarterId;
          $code->headquarterAssign = $headquarterId;
          $code->save();
      }

      return redirect('control/codes');

    }
/*
  public function pets(){

      $pets = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
      ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
      ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('pet.*','u.name as nameUser','u.lastName as lastNameUser','v.name as veterinary','h.principal as principal','h.city as city')
          ->get();



      return view('admin.super-admin.pets.index')->with('pets',$pets)->with('code',new Code())->with('characteristic',new Characteristic());

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
        $clinicHistories = ClinicHistory::where('petId','=',$pet->id)->get();
        //Appointments


        $veterinary = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'u.id', '=', 'op.userId')
        ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
        ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
        ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('v.*','h.principal as principal','h.city as city','h.address as address')
            ->where('pet.id','=',$pet->id)
            ->get();

        $vaccine = Vaccine::where('petId','=',$pet->id)->get();
        $appointments =  MedicalAppointment::where('petId','=',$pet->id)->get();
        return view('admin.super-admin.pets.profile')
                    ->with('pet',$pet)
                    ->with('user',$user)
                    ->with('code',new Code())
                    ->with('clinicHistories',$clinicHistories)
                    ->with('veterinary',$veterinary)
                    ->with('appointments',$appointments)
                    ->with('vaccine',$vaccine)
                    ->with('characteristic',new Characteristic());
    }

  public function users(){
        $clients = User::all();
        return view('admin.super-admin.users.index')->with('clients',$clients);
    }

  public function userProfile($profileId){
        $id = Crypt::decrypt($profileId);
        $user = User::find($id);

        return view('admin.super-admin.users.profile')
                    ->with('user',$user)
                    ->with('code',new Code());
    }

  public function deleteUser(Request $request){
      //Validation Rules
      $validator = Validator::make($request->all(), [
              'userDelete' => 'required|string|max:255',
              'email' => 'required|email|max:255',
      ]);
      //Validation Conditional
      if ($validator->fails()) {
              return redirect('control/users')->withErrors($validator)->withInput();
        }
        $id = Crypt::decrypt($request->userDelete);
        $user = User::find($id);
        $email = $request->email;
        if($user->email == $email){
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

          return redirect('/control/users');

        }else{
          Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
          return redirect('/control/users');

        }



    }

  public function getTransfer($userId){
      $veterinary = DB::table('Veterinary as v')
          ->join('Headquarters as h', 'v.id', '=', 'h.veterinaryId')
          ->select('h.*', 'v.name as nameVet', 'v.identification','v.id as veterinaryId')
          ->get();
      return view('admin.super-admin.users.transfer')
            ->with('veterinary',$veterinary)
            ->with('userId',$userId);
    }

  public function setTransfer(Request $request){
      //Validation Rules
      $validator = Validator::make($request->all(), [
              'userId' => 'required|string|max:255',
              'veterinary' => 'required|string|max:255'
      ]);
      //Validation Conditional
      if ($validator->fails()) {
              return redirect('control/users')->withErrors($validator)->withInput();
      }

      $userId =  Crypt::decrypt($request->userId);
      $headquarterId = Crypt::decrypt($request->veterinary);

      $ownerPet = OwnerPet::where('userId',$userId)->count();
      if($ownerPet != 0){
        $ownerPet = OwnerPet::where('userId',$userId)->get();
        foreach($ownerPet as $op){
          $pet = Pet::find($op->petId);
          if($pet->haveCode != false){
            $petSuscription = PetSuscription::where('petId',$pet->id)->firstOrFail();
            $code = Code::Find($petSuscription->codeId);
            $code->headquarterId = $headquarterId;
            $code->headquarterAssign = $headquarterId;
            $code->save();
          }
        }
      }

      $query = UserVeterinary::where('userId',$userId)->get();
      foreach($query as $q){
        $userVeterinary = UserVeterinary::find($q->id);
        $userVeterinary->headquarterId = $headquarterId;
        $userVeterinary->save();
      }
      return redirect('control/users');

    }

  public function getHeadquarter(){
      $user = Auth::user();
      $headquarterVeterinary = UserVeterinary::where('userId','=',$user->id)->first();
      $headquarter = Headquarter::find($headquarterVeterinary->headquarterId);
      return $headquarter;
    }

  public function report(){

      /*Excel::create('Listado Mascotas', function($excel) {
      $excel->sheet('Mascotas', function($sheet) {
        $user = Auth::user();
        $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
        //Get Clients By Headquarter
        $clients = DB::table('users as u')
            ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
            ->select('u.*')
            ->where('uv.userType','=','user')
            ->get();
        $pets = $this->getPetsByHeadquarterId($headquarter->headquarterId);
            view()->share('pets',$pets);
        $sheet->loadView('admin.administrator.report.pets')->with('pets', $pets);

      });
      })->export('xls');*/
      $user = Auth::user();
      $pets = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
      ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
      ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
      ->select('pet.*','u.name as nameUser','u.lastName as lastNameUser','v.name as veterinary','h.principal as principal','h.city as city')
      ->get();
        view()->share('code',new Code());
        view()->share('pets',$pets);

      Excel::create('Reporte-mascotas')
               ->loadView('admin.administrator.report.pets')
               ->setTitle('Title')
               ->sheet('Title')
               ->export('xls');
    }
/*
  public function reportUsers(){

      $user = Auth::user();
      $clients = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
          ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('u.*','v.name as veterinary','h.principal as principal','h.city as city')
          ->where('u.userType','=','user')
          ->get();
        view()->share('clients',$clients);

      Excel::create('Reporte-Usuarios')
               ->loadView('admin.administrator.report.usuarios')
               ->setTitle('Title')
               ->sheet('Title')
               ->export('xls');
    }

  public function reportVeterinary(){

      $user = Auth::user();
      $veterinary = DB::table('Veterinary as v')
          ->join('Headquarters as h', 'v.id', '=', 'h.veterinaryId')
          ->select('h.*', 'v.name as nameVeterinary', 'v.identification','v.id as veterinaryId')
          ->get();
        view()->share('veterinary',$veterinary);

      Excel::create('Reporte-Veterinarias')
               ->loadView('admin.administrator.report.veterinary')
               ->setTitle('Title')
               ->sheet('Title')
               ->export('xls');
    }

  public function validateNit(Request $request){
      if(!empty($request->identification)){
          $identification = trim($request->identification);
          $count = Veterinary::where('identification', '=', $identification)->count();
          if ($count == 0):
                $value =json_encode(array('valid' => true));
          else:
                $value =json_encode(array('valid' => false));
          endif;
      }else {
            $value =json_encode(array('valid' => false));
      }
      return $value;
    }

  public function adminSave(Request $request){

          $validator = Validator::make($request->all(), [
              'identification' => 'required|string|max:255',
              'name' => 'required|string|max:255',
              'lastName' => 'required|string|max:255',
              'email' => 'required|email|max:255',
              'phone' => 'required|max:255',
              'address' => 'required|max:255',
              'veterinary' => 'required|max:255',
              'username' => 'required|string|max:255',
              'password' => 'required|max:255'
          ]);

          if ($validator->fails()) {
              return redirect('control/admin')->withErrors($validator)->withInput();
          }

          //Get Principal Headquarter
          $veterinaryId = $request->veterinary;
          $veterinary = veterinary::find($veterinaryId);
          $headquarter = headquarter::where([['principal',true],['veterinaryId','=',$veterinaryId]])->first();
          if($headquarter != null){
            $headquarterId = $headquarter->id;
          }else{
            return redirect('control/admin');
          }

          //Save administrator
          $administrator = new User;
          $administrator->userType = 'admin';
          $administrator->identification = $request->identification;
          $administrator->name = $request->name;
          $administrator->lastName = $request->lastName;
          $administrator->email = $request->email;
          $phonesData = array('phone' => $request->phone);
          $phones  = json_encode($phonesData);
          $administrator->phones = $phones;
          $administrator->address = $request->address;
          $administrator->registerDate = date('Y-m-d');
          $administrator->username = $request->username;
          $administrator->password = bcrypt($request->password);
          $administrator->save();

          //Save as admin
          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'admin';
          $userVeterinary->userId = $administrator->id;
          $userVeterinary->headquarterId = $headquarterId;
          $userVeterinary->save();


          $result = array(
            'name' => $administrator->name,
            'username' => $administrator->username,
            'password' => $request->password,
            'veterinary' => $veterinary->name,
            'city' => $headquarter->city,
            'address' => $headquarter->address,
            'template' => 'layouts.emails.welcome_admin',
            'subject' => 'Identipet - Cuenta Creada'
          );

          $emails = array('email' => $administrator->email);
          $email = new Email();
          $email->sendEmail($result,$emails);

          return redirect('control/admin');

  }

  public function admin(){
          $veterinary = Veterinary::all();
          $administrators = DB::table('users as user')
              ->join('UsersVeterinarians as uv', 'user.id', '=', 'uv.userId')
              ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->select('user.*', 'v.name as veterinaryName','v.id as veterinaryId')
              ->get();

          return view('admin.super-admin.admin')->with('veterinary',$veterinary)->with('administrators',$administrators);
    }

  //Functions Veterinary

  public function veterinary(){
          $veterinary = DB::table('Veterinary as v')
              ->join('Headquarters as h', 'v.id', '=', 'h.veterinaryId')
              ->select('h.*', 'v.name', 'v.identification','v.id as veterinaryId')
              ->where('h.principal', '=', TRUE)
              ->get();
          return view('admin.super-admin.veterinarians.index')->with('veterinary',$veterinary);
    }

  public function addVeterinary(){
          return view('admin.super-admin.veterinarians.create');
    }

  public function veterinarySave(Request $request){
          //Validation Rules
          $validator = Validator::make($request->all(), [
                  'name' => 'required|string|max:255',
                  'country' => 'required|string|max:255',
                  'address' => 'required|string|max:255',
                  'city' => 'required|string|max:255',
                  'phone' => 'required|max:255',
                  'email' => 'required|email|max:255'
          ]);
          //Validation Conditional
          if ($validator->fails()) {
                  return redirect('control/veterinary')->withErrors($validator)->withInput();
            }


          //Veterinary Instance
          $veterinary = new Veterinary;
          $veterinary->identification = $request->identification;
          $veterinary->name = $request->name;
          $veterinary->email = $request->email;
          $veterinary->url = $request->url;
          $dataCharacteristics = array(
            'imgProfile' => '',
            'imgSlider' => '',
            'description' => '',
          );
          $characteristics  = json_encode($dataCharacteristics);
          $veterinary->characteristics = $characteristics;
          $veterinary->save();
          //Headquarter Instance
          $headquarter = new Headquarter;
          $headquarter->veterinaryId = $veterinary->id; //Get last Id Inserted (Veterinary)
          $headquarter->principal = true;
          $headquarter->country = $request->country;
          $headquarter->address = $request->address;
          $headquarter->city = $request->city;
          $headquarter->phone = $request->phone;
          $headquarter->email = $request->email;
          $headquarter->url = $request->url;
          $headquarter->save();



          //Save administrator
          $administrator = new User;
          $administrator->userType = 'admin';
          $administrator->identification = '';
          $administrator->name = $request->nameAdmin;
          $administrator->lastName = $request->lastNameAdmin;
          $administrator->email = $request->email;
          $phonesData = array('phone' => $request->phone_admin);
          $phones  = json_encode($phonesData);
          $administrator->phones = $phones;
          $administrator->address = $request->address;
          $administrator->registerDate = date('Y-m-d');
          $administrator->username = $request->username;
          $administrator->password = bcrypt($request->passwordAdmin);
          $administrator->save();

          //Save as admin
          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'admin';
          $userVeterinary->userId = $administrator->id;
          $userVeterinary->headquarterId = $headquarter->id;
          $userVeterinary->save();

          $result = array(
            'name' => $administrator->name,
            'username' => $administrator->username,
            'password' => $request->passwordAdmin,
            'veterinary' => $veterinary->name,
            'city' => $headquarter->city,
            'address' => $headquarter->address,
            'template' => 'layouts.emails.welcome_admin',
            'subject' => 'Identipet - Cuenta Creada'
          );

          $emails = array('email' => $administrator->email);
          $email = new Email();
          $email->sendEmail($result,$emails);



          //Redirect to page with message
          return redirect('control/veterinary');
    }

  public function deleteVeterinary($veterinaryId){

        $veterinary = Crypt::decrypt($veterinaryId);

        $headquarters = Headquarter::where('veterinaryId',$veterinary)->get();

        foreach($headquarters as $headquarter){
          //Search User by Headquarter
          $users = DB::table('users as user')
              ->join('UsersVeterinarians as uv', 'user.id', '=', 'uv.userId')
              ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->select('user.id')
              ->where('h.id','=',$headquarter->id)
              ->get();

          foreach($users as $user){
              $query = UserVeterinary::where('userId',$user->id)->get();
              foreach($query as $q){
                $userVeterinary = UserVeterinary::find($q->id);
                $userVeterinary->headquarterId = 1;
                $userVeterinary->save();
              }

          }

        }

        if ($veterinary != 1) {
          //Delete Headquarter
          DB::table('Headquarters')->where('veterinaryId',$veterinary)->delete();
          //Delete Veterinary
          Veterinary::destroy($veterinary);
          return redirect('control/veterinary');
        }else {
          return redirect('control/veterinary');
        }
    }

  public function addHeadquarter(Request $request,$veterinaryId){

      $veterinaryId = Crypt::decrypt($veterinaryId);
      //Headquarter Instance
      $headquarter = new Headquarter;
      $headquarter->veterinaryId = $veterinaryId; //Get last Id Inserted (Veterinary)
      $headquarter->principal = false;
      $headquarter->country = $request->country;
      $headquarter->address = $request->address;
      $headquarter->city = $request->city;
      $headquarter->phone = $request->phone;
      $headquarter->email = $request->email;
      $headquarter->url = $request->url;
      $headquarter->save();

      $veterinary = Veterinary::find($veterinaryId);

      $option = $request->active_tab;

      if($option == "administrator"){
          //Save administrator
          $administrator = new User;
          $administrator->userType = 'admin';
          $administrator->identification = $request->identificationAdmin;
          $administrator->name = $request->nameAdmin;
          $administrator->lastName = $request->lastNameAdmin;
          $administrator->email = $request->emailAdmin;
          $administrator->phones = $request->phoneAdmin;
          $administrator->address = $request->addressAdmin;
          $administrator->registerDate = date('Y-m-d');
          $administrator->username = $request->usernameAdmin;
          $administrator->password = bcrypt($request->passwordAdmin);
          $administrator->save();

          //Save as admin
          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'admin';
          $userVeterinary->userId = $administrator->id;
          $userVeterinary->headquarterId = $headquarter->id;
          $userVeterinary->save();


          $result = array(
            'name' => $administrator->name,
            'username' => $administrator->username,
            'password' => $request->passwordAdmin,
            'veterinary' => $veterinary->name,
            'city' => $headquarter->city,
            'address' => $headquarter->address,
            'template' => 'layouts.emails.welcome_admin',
            'subject' => 'Identipet - Cuenta Creada'
          );

          $emails = array('email' => $administrator->email);
          $email = new Email();
          $email->sendEmail($result,$emails);

      }

      return redirect('control/veterinary/'.$veterinaryId);
    }

  public function veterinaryId($veterinaryId){

      $veterinary = Veterinary::find(Crypt::decrypt($veterinaryId));
      $headquarters = Headquarter::where('veterinaryId',Crypt::decrypt($veterinaryId))->get();
      $countUsers = $clients = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
      ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
      ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('u.*')
          ->where('v.id', '=', Crypt::decrypt($veterinaryId))
          ->count();

      $countPets = $pets = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
      ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
      ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('pet.*','u.name as nameUser','u.lastName as lastNameUser')
          ->where('v.id', '=', Crypt::decrypt($veterinaryId))
          ->count();

      $pets = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
      ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
      ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('pet.*','u.name as nameUser','u.lastName as lastNameUser')
          ->where('v.id', '=', Crypt::decrypt($veterinaryId))
          ->get();


      $clients = DB::table('Pets as pet')
      ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
      ->join('users as u', 'u.id', '=', 'op.userId')
      ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
      ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
      ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('u.*')
          ->where('v.id', '=', Crypt::decrypt($veterinaryId))
          ->get();

      $administrators = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
          ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
          ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
          ->select('u.*','h.principal as principalHeadquarter','h.city as cityHeadquarter','h.phone as phoneHeadquarter')
          ->where('u.userType', '=', 'admin')
          ->where('h.veterinaryId', '=', Crypt::decrypt($veterinaryId))
          ->get();


      return view('admin.super-admin.veterinarians.profile')
            ->with('veterinary',$veterinary)
            ->with('headquarters',$headquarters)
            ->with('administrators',$administrators)
            ->with('clients',$clients)
            ->with('pets',$pets)
            ->with('code',new Code())
            ->with('countUsers',$countUsers)
            ->with('countPets',$countPets)
            ->with('characteristic',new Characteristic());
    }
*/
  //Functions Code



}
