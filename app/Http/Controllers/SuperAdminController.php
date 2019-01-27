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
      $hour = date('Hi');

      if ($hour >= '0500' && $hour <= '1100'){
        $event = 'desayuno';
        foreach($searchs as $search) {
          if ($search->description = 'desayuno' && $search->date = $dateToday){
            $activate = 0;
          }else {
            $activate = 1;
          }
        }
      }elseif($hour >= '1100' && $hour <= '1600'){
        $event = 'almuerzo';
        foreach($searchs as $search) {
          if ($search->description = 'almuerzo' && $search->date = $dateToday){
            $activate = 0;
          }else {
            $activate = 1;
          }
        }
      }elseif($hour >= '1700' && $hour <= '2100'){
        $event = 'cena';
        foreach($searchs as $search){
          if($search->description = 'cena' && $search->date = $dateToday){
            $activate = 0;
          }else {
            $activate = 1;
          }
        }
      }else{
        $event = '';
        $activate = 0;
      }
      return view('admin.search.index')->with('user',$user)->with('event',$event)->with('activate',$activate);

    }else{
      return redirect('http://www.cmb.org.co/corporativo/?identification='.$identification);
    }
  }

  public function saveEvent($identification, Request $request){
    $identification2 = Crypt::decrypt($identification);
    $user = User::where('identification', $identification2)->first();
    if($request->event != ""){
      $event = new Event;
      $event->description = $request->event;
      $event->userId = $user->id;
      $event->date = date('d-m-Y');
      $event->save();
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
