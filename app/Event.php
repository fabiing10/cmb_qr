<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model{
    //
    protected $table = 'Events';

    public function foundInside($id, $param){
      $foundInside = DB::table('users as u')
          ->join('Events as event', 'u.id', '=', 'event.userId')
          ->select('ps.codeId')
          ->where('u.id','=',$id)
          ->where('description','=','Entrada')
          ->where('event.date',$param)
          ->count();
      return $foundInside;
    }

    public function foundOutside($id, $param){
      $foundOutside = DB::table('users as u')
          ->join('Events as event', 'u.id', '=', 'event.userId')
          ->select('ps.codeId')
          ->where('u.id','=',$id)
          ->where('description','=','Salida')
          ->where('event.date',$param)
          ->count();
      return $foundOutside;
    }

    public function foundBreakfast($id, $param){
      $foundBreakfast = DB::table('users as u')
          ->join('Events as event', 'u.id', '=', 'event.userId')
          ->select('ps.codeId')
          ->where('u.id','=',$id)
          ->where('description','=','Desayuno')
          ->where('event.date',$param)
          ->count();
      return $foundBreakfast;
    }

    public function foundLunch($id, $param){
      $foundLunch = DB::table('users as u')
          ->join('Events as event', 'u.id', '=', 'event.userId')
          ->select('ps.codeId')
          ->where('u.id','=',$id)
          ->where('description','=','Almuerzo')
          ->where('event.date',$param)
          ->count();
      return $foundLunch;
    }

    public function foundDinner($id, $param){
      $foundDinner = DB::table('users as u')
          ->join('Events as event', 'u.id', '=', 'event.userId')
          ->select('ps.codeId')
          ->where('u.id','=',$id)
          ->where('description','=','Cena')
          ->where('event.date',$param)
          ->count();
      return $foundDinner;
    }


}
