<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class society extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
   */
    protected $fillable = [
      'name', 'email', 'phone', 'number','adress', 'city', 'code', 'description', 'logo'
   ];
}
