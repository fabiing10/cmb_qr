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

      $url = 'http://localhost:8000/events/'.$userIdentification;
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
      $url = 'http://localhost:8000/events/'.$identification;
      QrCode::format('svg')->size(400)->generate($url, $path.$user->identification.'.svg');
    }
    $files = base_path().'/public/codes/qr/';
    Zipper::make(base_path().'/public/codes/qr.zip')->add($files)->close();

    return response()->download(base_path().'/public/codes/qr.zip');
  }

  public function eventFound($identification){
    $identification = Crypt::decrypt($identification);
    $user = User::where('identification', $identification)->first();
    return view('admin.search.index')->with('user',$user);
  }

  public function saveEvent($identification, Request $request){
    $identification = Crypt::decrypt($identification);
    $user = User::where('identification', $identification)->first();

    $event = new Event;
    $event->description = $request->event;
    $event->userId = $user->id;
    $event->save();

    return view('admin.search.thanks')->with('user',$user);
  }

  public function users(){
        $clients = User::where('userType','user')->get();
        return view('admin.super-admin.users.index')->with('clients',$clients);
    }

}
