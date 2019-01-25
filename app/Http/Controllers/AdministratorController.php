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


  public function getNameVeterinary(){
    $user = Auth::user();
    $headquarterQuery = \App\UserVeterinary::where('userId','=',$user->id)->first();
    $headquarterId = $headquarterQuery->headquarterId;
    $headquarter = \App\Headquarter::find($headquarterId);
    $veterinary = \App\Veterinary::find($headquarter->veterinaryId);

    $name = $veterinary->name.' - '.$headquarter->city.' ('.$headquarter->nameHeadquarter.')';
    return $name;

  }

  public function dashboard(){

        $user = Auth::user();
        $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
        $headquarterId = $headquarter->headquarterId;


        $nameVeterinary = $this->getNameVeterinary();
        $value = session(['nameVeterinary' => $nameVeterinary]);

        $clients = DB::table('users as u')
            ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
            ->select('u.id')
            ->where('uv.headquarterId','=',$headquarterId)
            ->Where('u.userType', 'user')
            ->count();

        $pets = DB::table('Pets as pet')
            ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
            ->join('users as u', 'u.id', '=', 'op.userId')
            ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
            ->select('u.id')
            ->where('uv.headquarterId','=',$headquarterId)
            ->count();


        $codes = DB::table('Codes as c')
            ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
            ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId')
            ->where('h.id','=',$headquarterId)
            ->count();

        $appointments = DB::table('MedicalAppointments as ma')
            ->join('Pets as pet', 'ma.petId', '=', 'pet.id')
            ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
            ->join('users as u', 'op.userId', '=', 'u.id')
            ->select('u.name as user','u.lastName as userlast','u.identification as id','pet.name as namePet','ma.dateTime as dateAppointment','ma.headquarterId','ma.id as idAppointment','ma.status as status')
            ->where('ma.headquarterId','=',$headquarterId)
            ->get();


        return view('admin.administrator.dashboard')->with('clients',$clients)->with('pets',$pets)->with('codes',$codes)->with('appointments',$appointments);
  }

  public function getHeadquarter(){
    $user = Auth::user();
    $headquarterVeterinary = \App\UserVeterinary::where('userId','=',$user->id)->first();
    $headquarter = Headquarter::find($headquarterVeterinary->headquarterId);
    return $headquarter;
  }

  public function getVeterinaryId($headquarterId){
    $headquarter = Headquarter::where('id','=',$headquarterId)->first();
    $veterinary = Veterinary::where('id','=',$headquarter->veterinaryId)->first();
    return $veterinary;
  }
  public function requestCodes($id){
    $petId = Crypt::decrypt($id);
    $pet = Pet::find($petId);
    $headquarter = $this->getHeadquarter();
    $codes = DB::table('Codes as c')
        ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
        ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
        ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId','h.city as city','h.address as address')
        ->where('h.id','=',$headquarter->id)
        ->where('c.status','=',FALSE)
        ->get();

    return view('admin.administrator.codes.request')
    ->with('pet',$pet)
    ->with('codes',$codes);
  }
  public function requestAssign($code, $pet){
    $codes = Crypt::decrypt($code);

    $petSuscription = new PetSuscription;
    $petSuscription->petId = $pet;
    $petSuscription->codeId = $codes;
    $petSuscription->suscriptionType = 'veterinary';
    $petSuscription->suscriptionDate = date('Y-m-d');
    $petSuscription->belongsVeterinary = true;
    $petSuscription->save();
    //Update Status code
    $code = \App\Code::find($codes);
    $code->status = TRUE;
    $code->save();

    $pet = \App\Pet::find($pet);
    $pet->haveCode = true;
    $pet->activeCode = true;
    $pet->petStatus = true;
    $pet->save();

    return redirect('administrator/codes');
  }
  //Get all codes and return view
  public function codes(){

          $headquarter = $this->getHeadquarter();
          $codes = DB::table('Codes as c')
              ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId','h.city as city','h.address as address', 'h.principal as principal')
              ->where('h.id','=',$headquarter->id)
              ->where('c.status','=',FALSE)
              ->get();



          $codesCount = DB::table('Codes as c')
              ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId')
              ->where('h.id','=',$headquarter->id)
              ->where('c.status','=',FALSE)
              ->count();

          $veterinary = $this->getVeterinaryId($headquarter->id);

          $headquartersVeterinary = DB::table('Headquarters as h')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->select('h.*')
              ->where('v.id','=',$veterinary->id)
              ->where('h.principal','=',FALSE)
              ->get();


          //Get all active codes by Veterrinary (Includes Headquarters)
          $activeCodes = DB::table('Pets as pet')
              ->join('PetsSuscriptions as ps', 'pet.id', '=', 'ps.petId')
              ->join('Codes as c', 'ps.codeId', '=', 'c.id')
              ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->select('c.*', 'v.name as name', 'v.identification','v.id as veterinaryId','pet.name as namePet','pet.imageProfile as imageProfile')
              ->where('v.id','=',$veterinary->id)
              ->where('c.status','=',TRUE)
              ->get();


          $activeCodesHeadquarterId = DB::table('Pets as pet')
              ->join('PetsSuscriptions as ps', 'pet.id', '=', 'ps.petId')
              ->join('Codes as c', 'ps.codeId', '=', 'c.id')
              ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
              ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
              ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
              ->join('users as u', 'op.userId', '=', 'u.id')
              ->select('c.*','c.created_at as date','h.*','u.name as userName','u.id as userId','v.name as name', 'v.identification','v.id as veterinaryId','pet.name as namePet','pet.id as petId','pet.imageProfile as imageProfile')
              ->where('h.id','=',$headquarter->id)
              ->where('c.status','=',TRUE)
              ->get();

        //get All assign Codes


        $codesAssign = DB::table('Codes as c')
            ->join('Headquarters as h', 'c.headquarterId', '=', 'h.id')
            ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('c.*', 'v.name', 'v.identification','v.id as veterinaryId','h.city as city','h.address as address',  'h.principal as principal', 'h.nameHeadquarter')
            ->where('c.headquarterId','!=',$headquarter->id)
            ->where('v.id','=',$veterinary->id)
            ->get();

        /*$pets = DB::table('Pets as p')
            ->select('p.*')
            ->where('p.petRequest','=',true)
            ->get();*/

            $pets = DB::table('Pets as pet')
            ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
            ->join('users as u', 'u.id', '=', 'op.userId')
            ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
            ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
            ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('pet.*')
            ->where('pet.petRequest','=',true)
            ->where('pet.haveCode','!=',true)
            ->where('uv.headquarterId','=',$headquarter->id)
            ->get();


          return view('admin.administrator.codes.index')
                    ->with('headquarter',$headquarter)
                    ->with('codes',$codes)
                    ->with('codesAssign',$codesAssign)
                    ->with('activeCodes',$activeCodes)
                    ->with('activeCodesHeadquarterId',$activeCodesHeadquarterId)
                    ->with('headquartersVeterinary',$headquartersVeterinary)
                    ->with('codesCount',$codesCount)
                    ->with('characteristic',new Characteristic())
                    ->with('pets',$pets);


      //  return $activeCodesHeadquarterId;




  }

  //Get all Clients By Headquarter
  public function clients(){

          //Get Headquarter Id
          $user = Auth::user();
          $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
          $headquarterId = $headquarter->headquarterId;

          $clients = DB::table('users as u')
              ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
              ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
              ->select('u.*')
              ->where('h.id','=',$headquarterId)
              ->where('u.userType','=','user')
              ->get();
              $pets = Pet::all();
          return view('admin.administrator.clients.index')->with('clients',$clients)->with('pets',$pets);
  }

  public function addClient(){
      return view('admin.administrator.clients.create');
  }

  public function report($option, $id){
    $id = Crypt::decrypt($id);
    $clinicHistory = ClinicHistory::find($id);
    $pet = Pet::find($clinicHistory->petId);
    view()->share('pet',$pet);
    view()->share('clinicHistory',$clinicHistory);
    $pdf = PDF::loadView('admin.administrator.report.index');
    return $pdf->download('Historia-'.$pet->name.'.pdf');
    /*return view('admin.administrator.report.index')->with('pet',$pet)->with('clinicHistory',$clinicHistory);*/
  }

  public function reportVaccines($option, $idVaccine){
    $id = Crypt::decrypt($idVaccine);
    $vaccine = Vaccine::find($id);
    $pet = Pet::find($vaccine->petId);
        view()->share('pet',$pet);
        view()->share('vaccine',$vaccine);

    $pdf = PDF::loadView('admin.administrator.report.vaccine');
    return $pdf->download('vacunas-'.$pet->name.'.pdf');
  //  return view('admin.administrator.report.vaccine')->with('vaccine',$vaccine)->with('pet',$pet);
  }

  public function clinicHistory($id){
    $id = Crypt::decrypt($id);
    $user = Auth::user();
    $pet = Pet::find($id);
    return view('admin.administrator.pets.clinicHistory-add')->with('pet',$pet)->with('user',$user);
  }

  public function addclinicHistory($id,Request $request){
    $id = Crypt::decrypt($id);
    $headquarter = $this->getHeadquarter();
    $veterinary = $this->getVeterinaryId($headquarter->id);

    $referenceData = array(
      'userVeterinary' => $request->nameVeterinary,
      'veterinary' => $veterinary->name,
      'headquarter' => $headquarter->headquarterId,
      'state' => $request->state,
      'date' => date('Y-m-d'),
      'observations' => $request->observations
    );

    $reference  = json_encode($referenceData);

    //Save imageProfile
    if($request->imagen_diagnostica){
       $image = $request->imagen_diagnostica;
       $filename  = time().'.'.$image->getClientOriginalExtension();
       $path = public_path('uploads/images/'.$filename);
       Image::make($image->getRealPath())->resize(400, 400)->save($path);
       $imagen_diagnostica = $filename;
    }else{
       $imagen_diagnostica = 'none';
    }

    //Save imageProfile
    if($request->examen_laboratorio){
       $image = $request->examen_laboratorio;
       $filename  = time().'.'.$image->getClientOriginalExtension();
       $path = public_path('uploads/images/'.$filename);
       Image::make($image->getRealPath())->resize(400, 400)->save($path);
       $examen_laboratorio = $filename;
    }else{
       $examen_laboratorio = 'none';
    }

    //Save imageProfile

    $characteristicsData = array(
      'diet' => $request->diet,
      'reproductiveStatus' => $request->reproductiveStatus,
      'vaccines' => $request->vaccines,
      'cleaning' => $request->cleaning,
      'products' => $request->products,
      'origin' => $request->origin,
      'weight' => $request->weight,
      'temperature' => $request->temperature,
      'hearRate' => $request->hearRate,
      'breathingFrequency' => $request->breathingFrequency,
      'capilaryRefillTime' => $request->capilaryRefillTime,
      'mucous' => $request->mucous,
      'pulse' => $request->pulse,
      'anamenesis' => $request->anamenesis,
      'diseases' => $request->diseases,
      'attitude' => $request->attitude,
      'bodyCondition' => $request->bodyCondition,
      'hydration' => $request->hydration,
      'locomotion' => $request->locomotion,
      'respiratorySystem' => $request->respiratorySystem,
      'digestiveSystem' => $request->digestiveSystem,
      'genitourinarySystem' => $request->genitourinarySystem,
      'eyes' => $request->eyes,
      'ears' => $request->ears,
      'lymphNodes' => $request->lymphNodes,
      'skin' => $request->skin,
      'skeletalMuscle' => $request->skeletalMuscle,
      'nervousSystem' => $request->nervousSystem,
      'cardiovascularSystem' => $request->cardiovascularSystem,
      'examen_laboratorio' => $examen_laboratorio,
      'imagen_diagnostica' => $imagen_diagnostica,
    );

    $characteristics  = json_encode($characteristicsData);

    $clinicHistory = new ClinicHistory;
    $clinicHistory->petId = $id;
    $clinicHistory->reference = $reference;
    $clinicHistory->characteristics = $characteristics;
    $clinicHistory->save();

    return redirect('administrator/pets');
  }

  public function medicalAppointments($id){
    $id = Crypt::decrypt($id);
    $pet = Pet::find($id);
    return view('admin.administrator.pets.medicalAppointments-add')->with('pet',$pet);
  }

  public function addmedicalAppointments($id,Request $request){
    $user = Auth::user();
    $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
    $headquarterId = $headquarter->headquarterId;

    $new_date = date('Y-m-d', strtotime($request->date));
    $dateTime = $new_date.' '.$request->hour.':00';

    $appointment = new MedicalAppointment;
    $appointment->petId = Crypt::decrypt($id);
    $appointment->description = $request->description;
    $appointment->status = 'Activa';
    $propertiesData = array(
      'veterinary' => $request->veterinary,
      'cost' => $request->cost,
    );
    $properties  = json_encode($propertiesData);
    $appointment->properties = $properties;
    $appointment->dateTime = $dateTime;
    $appointment->headquarterId = $headquarterId;
    $appointment->save();

    $users = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'op.userId', '=', 'u.id')
        ->select('u.name as user','u.email as email','u.identification as id','pet.name as namePet')
        ->where('pet.id','=',$appointment->petId)
        ->get();

    foreach ($users as $user ){
        $email = $user->email;
        $pet = $user->namePet;
        $client = $user->user;
    }

    $headquarter = Headquarter::find($headquarterId);
    $veterinary = Veterinary::find($headquarter->veterinaryId);

    $result = array(
      'fecha' => $new_date,
      'hora' => $request->hour.':00',
      'veterinario' => $request->veterinary,
      'costo' => $request->cost,
      'email' => $email,
      'pet' => $pet,
      'client' => $client,
      'veterinary' => $veterinary->name,
      'address' => $headquarter->address

    );
    if(!empty($result['email'])){
      $email = $result['email'];
      Mail::send('layouts.emails.appointment', $result, function($message) use($email){
          $message->to($email)->subject('Identipet - Cita Medica');
      });
      \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
      return redirect('administrator/appointments');
    }else{
      \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
      return redirect('administrator/appointments');
    }
    return redirect('administrator/pets');
  }

  public function clientSave(Request $request){

          date_default_timezone_set("America/Bogota");

          $validator = Validator::make($request->all(), [
              'name' => 'required|string|max:255',
              'lastName' => 'required|string|max:255',
              'email' => 'required|email|max:255',
              'phone' => 'required|max:255',
              'address' => 'required|max:255',
              'username' => 'required|string|max:255',
              'password' => 'required|max:255'
          ]);
          if ($validator->fails()) {
              return redirect('administrator/clients/')->withErrors($validator)->withInput();
          }
          //Get Principal Headquarter
          $hq = $this->getHeadquarter();
          //Save administrator
          $client = new User;
          $client->userType = 'user';
          $client->name = $request->name;
          $client->identification = $request->identification;
          $client->lastName = $request->lastName;
          $client->email = $request->email;

          $phonesData = array(
            'phone' => $request->phone,
          );
          $imgProfile = array('img_profile' => 'none');
          $phones  = json_encode($phonesData);
          $client->phones = $phones;
          $client->address = $request->address;
          $client->country = "Colombia";
          $client->city = $request->city;
          $client->registerDate = date('Y-m-d');
          $client->username = $request->username;
          $client->registerType = "identipet";
          $client->imageProfile = json_encode($imgProfile);
          $client->password = bcrypt($request->password);
          $client->save();
          //Save as User
          $userVeterinary = new \App\UserVeterinary;
          $userVeterinary->userType = 'user';
          $userVeterinary->userId = $client->id;
          $userVeterinary->headquarterId = $hq->id;
          $userVeterinary->save();

          //Save Pet
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


          //Create Pet
          $pet = new Pet;
          $pet->petType = $request->petType;
          $pet->petStatus = 1; //1 = Active | 2 = Lost
          $pet->searchPetId = 0;
          if($request->codePet){
            $pet->haveCode = true;
            $pet->activeCode = true;
          }else{
            $pet->haveCode = false;
            $pet->activeCode = false;
          }
          $pet->name = $request->namePet;
          $pet->gender = $request->gender;
          $pet->age = $request->age;
          $pet->imageProfile = json_encode($imgProfile);
          $pet->characteristics = $characteristics;
          $pet->save();

          $ownerPet = new OwnerPet;
          $ownerPet->userId =$client->id;
          $ownerPet->petId = $pet->id;
          $ownerPet->save();

          if($request->codePet){

              $codeQuery = \App\Code::where('codes',$request->codePet)->get();
              foreach ($codeQuery as $codeResult) {
                $codeId = $codeResult->id;
              }
              $petSuscription = new PetSuscription;
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


          $result = array(
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password
          );


          if(!empty($result['email'])){
            $email = $result['email'];
            Mail::send('layouts.emails.welcome', $result, function($message) use($email){
                $message->to($email)->subject('Identipet - Mensajes');
            });
            \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
            return redirect('administrator/clients');

          }else{
            \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
            return redirect('administrator/clients');
          }


  }

  public function clientDelete($profileId){
      $id = Crypt::decrypt($profileId);
      $query = \App\UserVeterinary::where('userId',$id)->get();
      foreach ($query as $q) {
        $id = $q->id;
      }
      $userVeteriunary = \App\UserVeterinary::find($id);
      $userVeteriunary->headquarterId = 1;
      $userVeteriunary->save();
      return redirect('administrator/clients');
  }

  public function editClient($profileId){
    $id = Crypt::decrypt($profileId);
    $user = User::find($id);
    return view('admin.administrator.clients.edit')->with('user',$user);
  }
  public function updateClient(Request $request){

        date_default_timezone_set("America/Bogota");
        //Get Principal Headquarter
        $hq = $this->getHeadquarter();
        //Save administrator
        $client = User::find($request->userId);
        $client->userType = 'user';
        $client->name = $request->name;
        $client->identification = $request->identification;
        $client->lastName = $request->lastName;
        if($client->registerType != "socialite"){
          $client->email = $request->email;
        }


        $phonesData = array(
          'phone' => $request->phone,
        );
        $phones  = json_encode($phonesData);
        $client->phones = $phones;
        $client->address = $request->address;
        if($request->password != "" ){

          if($client->registerType != "socialite"){
            $client->password = bcrypt($request->password);
          }

        }
        $client->save();

        return redirect('administrator/clients');
  }

  public function editPet($idProfile){
    $id = Crypt::decrypt($idProfile);
    $pet = Pet::Find($id);

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

      return view('admin.administrator.pets.edit')->with('pet',$pet)->with('code_value',$code_value);
  }
  public function updatePet(Request $request){

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



    $pet = Pet::find($petId);
    $pet->petType = $request->petType;
    $pet->petStatus = 1; //1 = Active | 2 = Lost
    $pet->searchPetId = 0;
    if($request->codePet){
      $pet->haveCode = true;
      $pet->activeCode = true;
    }
    $pet->name = $request->namePet;
    $pet->gender = $request->gender;
    //Save imageProfile
    $imageprofilepet = json_decode($pet->imageProfile);
    if($imageprofilepet->img_profile === "none"){
      if($request->image){
         $image = $request->image;
         $filename  = time().'.'.$image->getClientOriginalExtension();
         $path = public_path('uploads/images/'.$filename);
         Image::make($image->getRealPath())->resize(400, 400)->save($path);
         $imgProfile = array('img_profile' => $filename);
         $pet->imageProfile = json_encode($imgProfile);
      }
    }


    $pet->characteristics = $characteristics;
    $pet->save();


    if($request->codePet){

        $codeQuery = \App\Code::where('codes',$request->codePet)->get();
        foreach ($codeQuery as $codeResult) {
          $codeId = $codeResult->id;
        }
        $petSuscription = new PetSuscription;
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


    return redirect('administrator');
  }

  public function clientProfile($profileId){

      $id = Crypt::decrypt($profileId);

      $pets = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'u.id', '=', 'op.userId')
        ->select('pet.*')
        ->where('u.id','=',$id)
        ->get();
      $user = User::find($id);

      return view('admin.administrator.clients.profile')
                  ->with('user',$user)
                  ->with('pets',$pets)
                  ->with('characteristic',new Characteristic())
                  ->with('code',new Code());


  }

  public function pets(){
          $user = Auth::user();
          $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
          //Get Clients By Headquarter
          $clients = DB::table('users as u')
              ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
              ->select('u.*')
              ->where('uv.headquarterId','=',$headquarter->headquarterId)
              ->where('uv.userType','=','user')
              ->get();
          $pets = $this->getPetsByHeadquarterId($headquarter->headquarterId);
          return view('admin.administrator.pets.index')
          ->with('pets',$pets)
          ->with('clients',$clients)
          ->with('characteristic',new Characteristic())
          ->with('code',new Code());
  }

  public function getRaces($petType){
    $races = characteristic::where('petType','=',$petType)->get();
    return $races;
  }

  public function getPetsByHeadquarterId($HeadquarterId){

    $pets = DB::table('Pets as pet')
    ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
    ->join('users as u', 'u.id', '=', 'op.userId')
    ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
    ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
    ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
    ->select('pet.*','u.name as nameUser','u.lastName as lastNameUser','v.name as veterinary','h.principal as principal','h.city as city')
    ->where('uv.headquarterId','=',$HeadquarterId)
    ->get();

    return $pets;

  }

  public function addPet($id){

      $id = Crypt::decrypt($id);
      $client = User::Find($id);

      $user = Auth::user();

      $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
      //Get Clients By Headquarter
      /*
      $clients = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
          ->select('u.*')
          ->where('uv.headquarterId','=',$headquarter->headquarterId)
          ->where('uv.userType','=','user')
          ->get();
          */
      return view('admin.administrator.pets.add')->with('client',$client);

  }

  public function petSave(Request $request){

          date_default_timezone_set("America/Bogota");

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


          //Create Pet
          $pet = new Pet;
          $pet->petType = $request->petType;
          $pet->petStatus = 1; //1 = Active | 2 = Lost
          $pet->searchPetId = 0;
          $pet->haveCode = false;
          $pet->activeCode = false;
          $pet->name = $request->name;
          //$pet->age = $request->age;
          $pet->age = $request->age;
          $pet->gender = $request->gender;
          $pet->imageProfile = json_encode($imgProfile);
          $pet->characteristics = $characteristics;
          $pet->description = $request->description;



          if($request->codePet){

            $pet->haveCode = true;
            $pet->activeCode = true;

          }else{
            $pet->haveCode = false;
            $pet->activeCode = false;
          }
          $pet->save();



          if($request->codePet){


            $codeQuery = \App\Code::where('codes',$request->codePet)->get();
            foreach ($codeQuery as $codeResult) {
              $codeId = $codeResult->id;
            }
            $petSuscription = new PetSuscription;
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

          }


          $ownerPet = new OwnerPet;
          $ownerPet->userId = $request->userOwner;
          $ownerPet->petId = $pet->id;
          $ownerPet->save();

          return redirect('administrator/pets');


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
        $vaccine = Vaccine::where('petId','=',$pet->id)->get();

        $veterinary = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'u.id', '=', 'op.userId')
        ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
        ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
        ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('v.*','h.principal as principal','h.city as city','h.address as address')
            ->where('pet.id','=',$pet->id)
            ->get();


        $appointments =  MedicalAppointment::where('petId','=',$pet->id)->get();
        return view('admin.administrator.pets.profile')
                    ->with('pet',$pet)
                    ->with('user',$user)
                    ->with('code',new Code())
                    ->with('characteristic',new Characteristic())
                    ->with('clinicHistories',$clinicHistories)
                    ->with('veterinary',$veterinary)
                    ->with('appointments',$appointments)
                    ->with('vaccine',$vaccine);

  }



  public function petProfileUpdate($id,Request $request){

    date_default_timezone_set("America/Bogota");

    $validator = Validator::make($request->all(), [
            'action' => 'required|string|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('administrator/pets')->withErrors($validator)->withInput();
    }

      switch($request->action) {
          case 'ClinicHistory':

              $headquarter = $this->getHeadquarter();
              $veterinary = $this->getVeterinaryId($headquarter->id);

              $referenceData = array(
                'userVeterinary' => $request->nameVeterinary,
                'veterinary' => $veterinary->name,
                'headquarter' => $headquarter->headquarterId,
                'state' => $request->state,
                'date' => date('Y-m-d'),
                'observations' => $request->observations
              );
              $reference  = json_encode($referenceData);

              $characteristicsData = array(
                'diet' => $request->diet,
                'reproductiveStatus' => $request->reproductiveStatus,
                'vaccines' => $request->vaccines,
                'cleaning' => $request->cleaning,
                'products' => $request->products,
                'dateProduct' => $request->dateProduct,
                'origin' => $request->origin,
                'weight' => $request->weight,
                'temperature' => $request->temperature,
                'hearRate' => $request->hearRate,
                'breathingFrequency' => $request->breathingFrequency,
                'capilaryRefillTime' => $request->capilaryRefillTime,
                'mucous' => $request->mucous,
                'skinTugor' => $request->skinTugor,
                'pulse' => $request->pulse,
                'other' => $request->other,
                'anamenesis' => $request->anamenesis,
                'diseases' => $request->diseases,
                'attitude' => $request->attitude,
                'bodyCondition' => $request->bodyCondition,
                'hydration' => $request->hydration,
                'locomotion' => $request->locomotion,
                'respiratorySystem' => $request->respiratorySystem,
                'digestiveSystem' => $request->digestiveSystem,
                'genitourinarySystem' => $request->genitourinarySystem,
                'eyes' => $request->eyes,
                'ears' => $request->ears,
                'lymphNodes' => $request->lymphNodes,
                'skin' => $request->skin,
                'skeletalMuscle' => $request->skeletalMuscle,
                'nervousSystem' => $request->nervousSystem,
                'cardiovascularSystem' => $request->cardiovascularSystem

              );

              $characteristics  = json_encode($characteristicsData);

              $clinicHistory = new ClinicHistory;
              $clinicHistory->petId = Crypt::decrypt($id);
              $clinicHistory->reference = $reference;
              $clinicHistory->characteristics = $characteristics;
              $clinicHistory->save();

              return redirect('administrator/pets/profile/'.$id);

              break;
          case 'manager':
              $this->profile = $this->adminProfile();
              break;
          case 'admin':
              $this->profile = $this->adminProfile();
              break;
          case 'student':
              $this->profile = $this->studentProfile();
              break;
          case 'default':
              return "Default";
              break;
      }
  }

  public function assignHeadquarter(Request $request){

    date_default_timezone_set("America/Bogota");
    $cantCodes = $request->cantCodes;
    $newHeadquarter = (int)$request->headquarter;
    $headquarter = $this->getHeadquarter();
    $codes = Code::where('headquarterId',$headquarter->id)->take($cantCodes)->get();
    foreach($codes as $update){
        $code = Code::find($update->id);
        $code->headquarterId = $newHeadquarter;
        $code->save();
    }

    return redirect('administrator/codes');


  }

  public function assignPets($id){

          $codeId = Crypt::decrypt($id);
          $code = \App\Code::find($codeId);


          $user = Auth::user();
          $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();


          $pets = DB::table('Pets as pet')
          ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
          ->join('users as u', 'u.id', '=', 'op.userId')
          ->join('UsersVeterinarians as uv', 'uv.userId', '=', 'u.id')
              ->select('pet.*','u.name as nameUser','u.lastName as lastNameUser')
              ->where('pet.haveCode','=',FALSE)
              ->where('uv.headquarterId','=',$headquarter->headquarterId)
              ->get();

          return view('admin.administrator.assignpets')->with('pets',$pets)->with('code',$code)->with('characteristic',new Characteristic());

  }

  //
  public function saveAssign($pet,$code){

          date_default_timezone_set("America/Bogota");
          $petSuscription = new PetSuscription;
          $petSuscription->petId = $pet;
          $petSuscription->codeId = $code;
          $petSuscription->suscriptionType = 'veterinary';
          $petSuscription->suscriptionDate = date('Y-m-d');
          $petSuscription->belongsVeterinary = true;
          $petSuscription->save();
          //Update Status code
          $code = \App\Code::find($code);
          $code->status = TRUE;
          $code->save();

          $pet = \App\Pet::find($pet);
          $pet->haveCode = true;
          $pet->activeCode =true;
          $pet->save();

          return redirect('administrator/codes');
  }

  //
  public function assignPetUser(Request $request){
          $validator = Validator::make($request->all(), [
                  'pet' => 'required||max:255',
                  'userId' => 'required|max:255'
          ]);
          if ($validator->fails()) {
              //return redirect('administrator/clients')->withErrors($validator)->withInput();
              return $validator;
          }
          $ownerPet = new OwnerPet;
          $ownerPet->userId = $request->userId;
          $ownerPet->petId = $request->pet;
          $ownerPet->save();
          return redirect('administrator/clients');
  }

  //vista citas
  public function appointments(){
      //Get Headquarter Id
      $user = Auth::user();
      $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
      $headquarterId = $headquarter->headquarterId;
      $appointments = DB::table('MedicalAppointments as ma')
          ->join('Pets as pet', 'ma.petId', '=', 'pet.id')
          ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
          ->join('users as u', 'op.userId', '=', 'u.id')
          ->select('u.name as user','pet.name as namePet','pet.id as petId','pet.characteristics as characteristics','ma.dateTime as dateAppointment','ma.headquarterId','ma.id as idAppointment','ma.properties as properties','ma.status as status')
          ->where('ma.headquarterId','=',$headquarterId)
          ->get();
          $pets = Pet::all();
      return view('admin.administrator.appointments.index')->with('appointments',$appointments)->with('pets',$pets)->with('characteristic',new Characteristic());
  }


  public function getPetsAppointments(){
      $user = Auth::user();
      $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
      $headquarterId = $headquarter->headquarterId;
      $pets = $this->getPetsByHeadquarterId($headquarterId);
      return view('admin.administrator.appointments.pets')->with('pets',$pets)->with('characteristic',new Characteristic());
  }


  public function appointmentsSave(Request $request){

      date_default_timezone_set("America/Bogota");
      $user = Auth::user();
      $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
      $headquarterId = $headquarter->headquarterId;

      $validator = Validator::make($request->all(), [
              'pet' => 'required|max:255',
              'description' => 'required|max:255',
              'date' => 'required|max:255',
      ]);
      if ($validator->fails()) {

        redirect('administrator/appointments')->withErrors($validator)->withInput();
      }
      $new_date = date('Y-m-d', strtotime($request->date));
      $dateTime = $new_date.' '.$request->hour.':00';

      $appointment = new MedicalAppointment;
      $appointment->petId = Crypt::decrypt($request->pet);
      $appointment->description = $request->description;
      $appointment->status = 'Activa';
      $propertiesData = array(
        'veterinary' => $request->veterinary,
        'cost' => $request->cost,
      );
      $properties  = json_encode($propertiesData);
      $appointment->properties = $properties;
      $appointment->dateTime = $dateTime;
      $appointment->headquarterId = $headquarterId;
      $appointment->save();


      $users = DB::table('Pets as pet')
          ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
          ->join('users as u', 'op.userId', '=', 'u.id')
          ->select('u.name as user','u.email as email','u.identification as id','pet.name as namePet')
          ->where('pet.id','=',$appointment->petId)
          ->get();

      foreach ($users as $user ){
          $email = $user->email;
          $pet = $user->namePet;
          $client = $user->user;
      }

      $headquarter = Headquarter::find($headquarterId);
      $veterinary = Veterinary::find($headquarter->veterinaryId);

      $result = array(
        'fecha' => $new_date,
        'hora' => $request->hour.':00',
        'veterinario' => $request->veterinary,
        'costo' => $request->cost,
        'email' => $email,
        'pet' => $pet,
        'client' => $client,
        'veterinary' => $veterinary->name,
        'address' => $headquarter->address

      );


      if(!empty($result['email'])){
        $email = $result['email'];
        Mail::send('layouts.emails.appointment', $result, function($message) use($email){
            $message->to($email)->subject('Identipet - Cita Medica');
        });
        \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
        return redirect('administrator/appointments');

      }else{
        \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
        return redirect('administrator/appointments');
      }

  }


  public function getAppointment($id){
      $appointent = MedicalAppointment::find($id);
      return $appointent;
  }
  public function selectAppointment($id){
    date_default_timezone_set("America/Bogota");
    $id = Crypt::decrypt($id);
    $appointment = MedicalAppointment::find($id);
    return view('admin.administrator.appointments.reschedule')->with('appointment',$appointment);
    //return $appointment;
  }
  public function detailsAppointment($id){
    $id = Crypt::decrypt($id);
    $appointment = MedicalAppointment::find($id);
    return view('admin.administrator.appointments.details')->with('appointment',$appointment);
    //return $appointment;
  }
  public function rescheduleAppointments($id, Request $request){

    date_default_timezone_set("America/Bogota");
    $id = Crypt::decrypt($id);

    $new_date = date('Y-m-d', strtotime($request->date));
    $dateTime = $new_date.' '.$request->hour.':00';

    $appointment = MedicalAppointment::find($id);
    $appointment->dateTime = $dateTime;
    $appointment->status = 'Reprogramada';
    $appointment->save();


    $users = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'op.userId', '=', 'u.id')
        ->select('u.name as user','u.email as email','u.identification as id','pet.name as namePet')
        ->where('pet.id','=',$appointment->petId)
        ->get();

        foreach ($users as $user ){
            $email = $user->email;
            $pet = $user->namePet;
            $client = $user->user;
        }

        $result = array(
          'fecha' => $dateTime,
          'email' => $email,
          'pet' => $pet,
          'client' => $client
        );


        if(!empty($result['email'])){
          $email = $result['email'];
          Mail::send('layouts.emails.reschedule', $result, function($message) use($email){
              $message->to($email)->subject('Identipet - Cita Medica-Reprogramada');
          });
          \Session::flash('flash_message','Se ha enviado el mensaje correctamente.. Gracias por Ayudar!');
          return redirect('administrator/appointments');

        }else{
          \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
          return redirect('administrator/appointments');
        }


  }
  public function activeAppointments($id){

    $id = Crypt::decrypt($id);
    $appointment = MedicalAppointment::find($id);
    $appointment->status = 'Activa';
    $appointment->save();

    return redirect('administrator/appointments');
  }
  public function cancelAppointments(Request $request){

    $appointment = MedicalAppointment::find($request->idAppointment);
    $appointment->status = 'Cancelada';
    $appointment->save();

    $users = DB::table('Pets as pet')
        ->join('OwnersPets as op', 'pet.id', '=', 'op.petId')
        ->join('users as u', 'op.userId', '=', 'u.id')
        ->select('u.name as user','u.email as email','u.identification as id','pet.name as namePet')
        ->where('pet.id','=',$appointment->petId)
        ->get();

        foreach ($users as $user ){
            $email = $user->email;
            $pet = $user->namePet;
            $client = $user->user;
        }
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
          return redirect('administrator/appointments');

        }else{
          \Session::flash('flash_message','No se ha podido enviar tu mensaje, pero ya dejamos el reporte.. Gracias por tu ayuda!');
          return redirect('administrator/appointments');
        }
    return redirect('administrator/appointments');
  }

  public function saveClinicHistory($id){
      return $id;
  }

  public function getClinicHistory($id){
      $clinicHistory = ClinicHistory::find($id);
      return $clinicHistory;
  }
  public function getVaccines($idVaccine){
    $id = Crypt::decrypt($idVaccine);
    $vaccine = Vaccine::find($id);
    return $vaccine;
  }



  public function vaccines($id){
    $id = Crypt::decrypt($id);
    $pet = Pet::find($id);
    return view('admin.administrator.pets.vaccines-add')->with('pet',$pet);
  }

  public function addvaccines($id,Request $request){

    date_default_timezone_set("America/Bogota");
    $idPet = Crypt::decrypt($id);
    $pet = Pet::find($idPet);

    if($request->sticker){
       $image = $request->sticker;
       $filename  = time().'.'.$image->getClientOriginalExtension();
       $path = public_path('uploads/images/'.$filename);
       Image::make($image->getRealPath())->resize(400, 400)->save($path);
       $sticker = $filename;
    }else{
       $sticker = 'none';
    }
/*
    $vaccinesData = array(
      'tipo_vacuna' => $request->tipo_vacuna,
      'date' => $request->date,
      'vaccines' => json_encode($request->vaccines)
    );*/
    $vaccines  = json_encode($request->vaccines);

    $vaccine = new Vaccine;
    $vaccine->petId = $idPet;
    $vaccine->vaccines = $vaccines;
    $vaccine->agePet = $pet->age;
    $vaccine->sticker = $sticker;
    $vaccine->lote = $request->lote;
    $vaccine->laboratory = $request->laboratory;
    $vaccine->date = date('Y-m-d');
    $vaccine->typeVaccine = $request->typeVaccine;
    $vaccine->save();

    return redirect('administrator/pets');
    //return $request->vaccines;
  }

/*public function veterinarys(){

  $Veterinarys = veterinary::all()->get();
  return view('admin.administrator.headquarters.index')->with('veterinarys',$veterinarys);
}
*/
  public function headquarters(){

    date_default_timezone_set("America/Bogota");
    $headquarter = $this->getHeadquarter();
    //Get headquartes by Veterinary Id
    $headquarters = DB::table('users as user')//Headquarter::where('veterinaryId',$headquarter->veterinaryId)
    ->join('UsersVeterinarians as uv', 'user.id', '=', 'uv.userId')
    ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
    ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
    ->select('h.*','v.name', 'user.name as name_admin')
    ->where('v.id','=',$headquarter->veterinaryId)
    ->groupBy('h.id','v.name', 'user.name')
    ->get();

    $administrators = DB::table('users as user')
        ->join('UsersVeterinarians as uv', 'user.id', '=', 'uv.userId')
        ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
        ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
        ->select('user.*','h.principal as principal','h.address as headquarterAddress','h.city as headquarterCity','v.name as nameVeterinary','h.nameHeadquarter as nameHeadquarter')
        ->where('v.id','=',$headquarter->veterinaryId)
        ->where('user.userType','=','admin')
        ->get();
    return view('admin.administrator.headquarters.index')->with('administrators',$administrators)->with('headquarters',$headquarters);

  }

  public function addHeadquarter(){
    $headquarter = $this->getHeadquarter();
    $user = Auth::user();

    $headquarterprincipal = DB::table('Headquarters as h')
        ->select('h.url')
        ->where('h.principal','=','true')
        ->where('h.veterinaryId','=',$headquarter->veterinaryId)
        ->get();
    return view('admin.administrator.headquarters.create')
          ->with('headquarter',$headquarter)
          ->with('headquarterprincipal',$headquarterprincipal);
  }
  public function getHeadquarters(){
    $headquarter = $this->getHeadquarter();
    $user = Auth::user();

    $headquarters = DB::table('Headquarters as h')
        ->select('h.*')
        ->where('h.veterinaryId','=',$headquarter->veterinaryId)
        ->get();


      return view('admin.administrator.headquarters.addAdministrator')->with('headquarters',$headquarters);
  }
  public function saveAdministrator(Request $request){
    date_default_timezone_set("America/Bogota");
      $administrator = new User;
      $administrator->userType = 'admin';
      $administrator->identification = '';
      $administrator->name = $request->nameAdmin;
      $administrator->lastName = $request->lastNameAdmin;
      $administrator->registerType = "identipet";
      $administrator->username = $request->username;
      $administrator->address = $request->address;
      $administrator->email = $request->email;
      $administrator->password = bcrypt($request->passwordAdmin);
      $administrator->save();

      $userVeterinary = new \App\UserVeterinary;
      $userVeterinary->userType = 'admin';
      $userVeterinary->userId = $administrator->id;
      $userVeterinary->headquarterId = $request->headquarter;
      $userVeterinary->save();

      return redirect('administrator/headquarters');
  }
  public function deleteHcAdmin($id){
    $adminId = Crypt::decrypt($id);
    $query = \App\UserVeterinary::where('userId',$adminId)->delete();
    $queryUser = \App\User::where('id',$adminId)->delete();
    return redirect('administrator/headquarters');
  }
  public function saveHeadquarter(Request $request){

    $hq = $this->getHeadquarter();

    //Headquarter Instance
    $headquarter = new Headquarter;
    $headquarter->veterinaryId = $hq->veterinaryId;
    $headquarter->principal = false;
    $headquarter->nameHeadquarter = $request->name_headquarter;
    $headquarter->country = "Colombia";
    $headquarter->address = $request->address;
    $headquarter->city = $request->city;
    $headquarter->phone = $request->phone;
    $headquarter->email = $request->email;
    $headquarter->url = $request->url;
    $headquarter->save();

    $veterinary = Veterinary::find($hq->veterinaryId);

    //Save administrator
    $administrator = new User;
    $administrator->userType = 'admin';
    $administrator->identification = '';
    $administrator->name = $request->nameAdmin;
    $administrator->lastName = $request->lastNameAdmin;
    $administrator->email = $request->email;

    $phonesData = array('phone' => $request->phone);
    $phones  = json_encode($phonesData);

    $administrator->phones = $phones;
    $administrator->address = $request->address;
    $administrator->registerDate = date('Y-m-d');
    $administrator->registerType = "identipet";
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


    return redirect('administrator/headquarters');
  }
  public function editHeadquarter($idProfile){
    $id = Crypt::decrypt($idProfile);
    $headquarter = headquarter::Find($id);
    return view('admin.administrator.headquarters.edit')
          ->with('headquarter',$headquarter);
  }

  public function updateHeadquarter($idProfile,Request $request){
    $id = Crypt::decrypt($idProfile);

    //Headquarter Instance
    $headquarter = headquarter::Find($id);
    $headquarter->nameHeadquarter = $request->name_headquarter;
    $headquarter->address = $request->address;
    $headquarter->city = $request->city;
    $headquarter->phone = $request->phone;
    $headquarter->email = $request->email;
    $headquarter->url = $request->url;
    $headquarter->save();

    $veterinary = Veterinary::find($headquarter->veterinaryId);

    return redirect('administrator/headquarters');
  }

  public function deleteHeadquarter($idProfile){

      $id = Crypt::decrypt($idProfile);
      //Headquarter Instance
      $headquarter = headquarter::Find($id);
      //VeterinaryId
      $veterinaryId = $headquarter->veterinaryId;
      //HeadquarterPrincipal

      $count_h_principal = DB::table('Headquarters')->where('veterinaryId',$veterinaryId)->where('principal',true)->count();
      if($count_h_principal > 0){

        $h_principal = DB::table('Headquarters')->where('veterinaryId',$veterinaryId)->where('principal',true)->take(1)->get();
        foreach ($h_principal as $headquarter) {
          $principalId = $headquarter->id;
        }
        $users = DB::table('users as user')
            ->join('UsersVeterinarians as uv', 'user.id', '=', 'uv.userId')
            ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
            ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
            ->select('user.*')
            ->where('uv.headquarterId','=',$id)
            ->where('user.userType','user')
            ->get();

        //Change Headquarter
        foreach($users as $user){
            $query = UserVeterinary::where('userId',$user->id)->get();
            foreach($query as $q){
              $userVeterinary = UserVeterinary::find($q->id);
              $userVeterinary->headquarterId = $principalId;
              $userVeterinary->save();
            }

        }

        //Change Appointments
        $appointments = DB::table('MedicalAppointments')->where('headquarterId',$id)->get();
        foreach($appointments as $appointment){
              $app = MedicalAppointment::find($appointment->id);
              $app->headquarterId = $principalId;
              $app->save();
        }

        //Change Suscription
        $suscriptions = DB::table('PetsSuscriptions')->where('headquarterId',$id)->get();
        foreach($suscriptions as $suscription){
              $app = PetSuscription::find($suscription->id);
              $app->headquarterId = $principalId;
              $app->save();
        }

        DB::table('Headquarters')->where('id',$id)->delete();

        return redirect('administrator/headquarters');
      }else{
        return redirect('administrator/headquarters');
      }






  }

  public function editHcAdmin($id){
    $id = Crypt::decrypt($id);
    $administrator = User::Find($id);
    return view('admin.administrator.headquarters.editHqAdmin')
          ->with('administrator',$administrator);
  }

  public function updateHcAdmin($id,Request $request){

        date_default_timezone_set("America/Bogota");
        $id = Crypt::decrypt($id);

        //Save administrator
        $administrator = User::Find($id);
        $administrator->userType = 'admin';
        $administrator->identification = $request->identification;
        $administrator->name = $request->nameAdmin;
        $administrator->lastName = $request->lastNameAdmin;
        $administrator->email = $request->email;
        $phonesData = array('phone' => $request->phone);
        $phones  = json_encode($phonesData);
        $administrator->phones = $phones;
        $administrator->address = $request->address;
        $administrator->registerDate = date('Y-m-d');
        $administrator->username = $request->username;
        $administrator->password = bcrypt($request->passwordAdmin);
        $administrator->save();

        return redirect('administrator/headquarters');
  }



  /*Reports*/

  public function reportClients(){

    Excel::create('Listado Clientes', function($excel) {

    $excel->sheet('New sheet', function($sheet) {

      $user = Auth::user();
      $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
      $headquarterId = $headquarter->headquarterId;
      $clients = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
          ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
          ->select('u.*')
          ->where('h.id','=',$headquarterId)
          ->where('u.userType','=','user')
          ->get();
      $sheet->loadView('admin.administrator.clients.excel.clients')->with('clients', $clients);

    });

    })->export('xls');



  }

  public function reportHeadquarters(){

    $headquarter = $this->getHeadquarter();
    //Get headquartes by Veterinary Id
    $headquarters = DB::table('users as user')//Headquarter::where('veterinaryId',$headquarter->veterinaryId)
    ->join('UsersVeterinarians as uv', 'user.id', '=', 'uv.userId')
    ->join('Headquarters as h', 'uv.headquarterId', '=', 'h.id')
    ->join('Veterinary as v', 'h.veterinaryId', '=', 'v.id')
    ->select('h.*','v.name')
    ->where('v.id','=',$headquarter->veterinaryId)
    ->where('user.userType','=','admin')
    ->get();

    view()->share('headquarters',$headquarters);

    Excel::create('Reporte-Sedes')
             ->loadView('admin.administrator.report.headquarters')
             ->setTitle('Title')
             ->sheet('Title')
             ->export('xls');
  }

  public function reportPets(){


    Excel::create('Listado Mascotas', function($excel) {

    $excel->sheet('New sheet', function($sheet) {

      $user = Auth::user();
      $headquarter = \App\UserVeterinary::where('userId','=',$user->id)->first();
      //Get Clients By Headquarter
      $clients = DB::table('users as u')
          ->join('UsersVeterinarians as uv', 'u.id', '=', 'uv.userId')
          ->select('u.*')
          ->where('uv.headquarterId','=',$headquarter->headquarterId)
          ->where('uv.userType','=','user')
          ->get();
      $pets = $this->getPetsByHeadquarterId($headquarter->headquarterId);
      $sheet->loadView('admin.administrator.pets.excel.pets')->with('pets', $pets);

    });

    })->export('xls');
  }


}
