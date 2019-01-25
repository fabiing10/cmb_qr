<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Code extends Model
{
  //Add Table Code
  protected $table = 'Codes';
  private $codeId;


  public function generateCode($longitud) {
    $key = '';
    $pattern = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
  }

  public function getCode(){
    $code = $this->generateCode(5);
    $codes = Code::where('codes','=',$code)->get();
    if(!empty($codes)){
      return $code;
    }else{
      $code = $this->generateCode(5);
      return $code;
    }
  }

  public function getCodeByPet($petId){
    $getCode = DB::table('Pets as p')
        ->join('PetsSuscriptions as ps', 'p.id', '=', 'ps.petId')
        ->select('ps.codeId')
        ->where('ps.petId','=',$petId)
        ->get();

    foreach($getCode as $codeSuscription){
      $this->codeId = $codeSuscription->codeId;
    }
    $code = Code::find($this->codeId);
    if($code != null){
      return $code->codes;
    }else{
      return "Sin Asignar";
    }

  }

}
