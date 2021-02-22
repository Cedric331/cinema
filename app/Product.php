<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'image','description','price', 'top'
  ];

  public function ingredients()
  {
     return $this->belongsToMany(Ingredient::class);
  }
}
