<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
  //Add Table Characteristic
  protected $table = 'Characteristics';


  public function getRace($petId){
    $pet = Pet::Find($petId);
    $characteristics = json_decode($pet->characteristics);
    $race = characteristic::find($characteristics->raza);
    return $race->race;
  }
}
