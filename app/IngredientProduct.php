<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientProduct extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'product_id', 'ingredient_id',
   ];
}
