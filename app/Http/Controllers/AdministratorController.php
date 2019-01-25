<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Auth,DB,Crypt,Image,Mail,PDF,Excel;
use App\User,App\Email;
use App\Pet,App\Headquarter,App\Veterinary;
use App\Code,App\Characteristic;
use App\PetSuscription;
use App\OwnerPet;
use App\Vaccine;
use App\MedicalAppointment;
use App\ClinicHistory;
use App\UserVeterinary;



class AdministratorController extends Controller
{

  public function dashboard(){
        $user = Auth::user();
        return view('admin.administrator.dashboard');
  }

}
