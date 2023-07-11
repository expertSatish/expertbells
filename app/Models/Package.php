<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public static function saveData($dataVal, $id = null)
    {
      $saveData = ($id) ? Package::find($id) : new Package;
      $saveData->description = $dataVal->description;
      $saveData->user_id = $dataVal->user_id;
      $saveData->package_name = $dataVal->package_name;
      $saveData->number_session = $dataVal->number_session;
      $saveData->prince_of_session = $dataVal->prince_of_session;
      $saveData->time = $dataVal->time;
      $saveData->save();
    }
  
}
