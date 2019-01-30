<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,Validator, Input, Redirect,DB,Crypt,QrCode,Zipper, Session,File,Storage;
use Image,Mail,PDF,Excel;
use App\User,App\Pet,App\UserVeterinary,App\ClinicHistory,App\Vaccine,App\MedicalAppointment,App\Veterinary,App\Email,App\SearchPet,App\OwnerPet,App\PetSuscription,App\SearchHistory;
use App\Headquarter;
use App\Event;
use App\Code,App\Characteristic;


class SuperAdminController extends Controller
{
  private $data;
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
    $user->zona = $request->zona;
    $user->iglesia = $request->zona;
    $user->save();

    return redirect('control/users');
  }

  public function reportUsers($param){

    $reportInsideCount = Event::where('date',$param)->where('description','Entrada')->count();
    $reportOutsideCount = Event::where('date',$param)->where('description','Salida')->count();
    $userTotal = User::all()->count();
    $userWithoutOutside = ($userTotal - $reportInsideCount) - 2;
    $reportBreakfastCount = Event::where('date',$param)->where('description','Desayuno')->count();
    $reportLunchCount = Event::where('date',$param)->where('description','Almuerzo')->count();
    $reportDinnerCount = Event::where('date',$param)->where('description','Cena')->count();

    $users = User::all();

    return view('admin.super-admin.users.report')
    ->with('users', $users)
    ->with('reportInsideCount', $reportInsideCount)
    ->with('reportOutsideCount', $reportOutsideCount)
    ->with('userWithoutOutside', $userWithoutOutside)
    ->with('reportBreakfastCount', $reportBreakfastCount)
    ->with('reportLunchCount', $reportLunchCount)
    ->with('reportDinnerCount', $reportDinnerCount)
    ->with('param', $param)
    ->with('event',new Event());
  }

  public function codeQR($userId){
      $userId = Crypt::decrypt($userId);

      $user = User::find($userId);

      $userIdentification = Crypt::encrypt($user->identification);

      $url = 'http://qr.cmb.org.co/events/'.$userIdentification;
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
      $url = 'http://qr.cmb.org.co/events/'.$identification;
      QrCode::format('svg')->size(400)->generate($url, $path.$user->identification.'.svg');
    }
    $files = base_path().'/public/codes/qr/';
    Zipper::make(base_path().'/public/codes/qr.zip')->add($files)->close();

    return response()->download(base_path().'/public/codes/qr.zip');
  }

  public function eventFound($identification){
    date_default_timezone_set('America/Bogota');

    $userValidate = Auth::user();
    if($userValidate != ''){
      $identification = Crypt::decrypt($identification);
      $user = User::where('identification', $identification)->first();
      $dateToday = date('d-m-Y');
      $searchs = Event::where('userId',$user->id)->where('date','=',$dateToday)->get();


      $countS = Event::where('userId',$user->id)->where('date','=',$dateToday)->count();

      //Count Desayuno
      $countDesayuno = Event::where('userId',$user->id)->where('date','=',$dateToday)->where('description','=','Desayuno')->count();
      //Count Almuerzo
      $countAlmuerzo = Event::where('userId',$user->id)->where('date','=',$dateToday)->where('description','=','Almuerzo')->count();
      //Count Cena
      $countCena = Event::where('userId',$user->id)->where('date','=',$dateToday)->where('description','=','Cena')->count();

      //Entradas
      $countEntrada = Event::where('userId',$user->id)->where('description','=','Entrada')->where('date','=',$dateToday)->count();
      //Salidas
      $countSalida = Event::where('userId',$user->id)->where('description','=','Salida')->where('date','=',$dateToday)->count();

      //Desayuno
      $dataDesayuno = Event::where('userId',$user->id)->where('description','=','Desayuno')->where('date','=',$dateToday)->get();
      //Almuerzo
      $dataAlmuerzo = Event::where('userId',$user->id)->where('description','=','Almuerzo')->where('date','=',$dateToday)->get();
      //Cena
      $dataCena = Event::where('userId',$user->id)->where('description','=','Cena')->where('date','=',$dateToday)->get();



      $hour = date('Hi');

      if ($hour >= '0500' && $hour < '1100'){
        $event = 'Desayuno';
        if($countS == 0){
          $activate = true;

        }else{

          if($countDesayuno == 0){
            $activate = true;
          }else{
            $activate = false;
          }


        }

      }elseif($hour >= '1100' && $hour <= '1500'){
        $event = 'Almuerzo';
        if($countS == 0){
          $activate = true;
        }else{
          if($countAlmuerzo == 0){
            $activate = true;
          }else{
            $activate = false;
          }
        }

      }elseif($hour > '1700' && $hour < '2100'){
        $event = 'Cena';
        if($countS == 0){
          $activate = true;
        }else{
          if($countCena == 0){
            $activate = true;
          }else{
            $activate = false;
          }
        }

      }else{
        $event = 'none';
        $activate = 0;
      }



      return view('admin.search.index')
      ->with('user',$user)
      ->with('event',$event)
      ->with('activate',$activate)
      ->with('countEntrada',$countEntrada)
      ->with('countSalida',$countSalida)
      ->with('countDesayuno',$countDesayuno)
      ->with('countAlmuerzo',$countAlmuerzo)
      ->with('countCena',$countCena);

    }else{
      return redirect('http://www.cmb.org.co/corporativo/?identification='.$identification);
    }
  }

  public function saveEvent($identification, Request $request){

    date_default_timezone_set('America/Bogota');
    $identification2 = Crypt::decrypt($identification);
    $user = User::where('identification', $identification2)->first();

    $dateToday = date('d-m-Y');
    $validate = Event::where('userId',$user->id)->where('description','=',$request->event)->where('date','=',$dateToday)->count();

    if($request->event != ""){
      /*if($validate <= 0 && $request->event == 'Desayuno' || $request->event == 'Almuerzo' || $request->event == 'Cena'){
        return view('admin.search.thanks')->with('user',$user);
      }else{
        $event = new Event;
        $event->description = $request->event;
        $event->userId = $user->id;
        $event->date = date('d-m-Y');
        $event->save();
      }*/
      return $validate;

      return view('admin.search.thanks')->with('user',$user);
    }else {
      return redirect('events/'.$identification);
    }

  }

  public function users(){
        $clients = User::where('userType','user')->get();
        return view('admin.super-admin.users.index')->with('clients',$clients);
    }

}
