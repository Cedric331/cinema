<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ingredients')->insert([
         ['name' => 'Sauce Tomate' ],
         ['name' => 'Jambon' ],
         ['name' => 'Saumon fumé' ],
         ['name' => 'Mozzarela' ],
         ['name' => 'Roquefort' ],
         ['name' => 'Emmental' ],
         ['name' => 'Parmigiano' ],
         ['name' => 'Olives' ],
         ['name' => 'Piment d\'espelette' ],
         ['name' => 'Champignons' ],
         ['name' => 'Reblochon' ],
         ['name' => 'Ananas' ],
         ['name' => 'Pomme de terre' ],
         ['name' => 'Crême fraîche' ],
         ['name' => 'Tomate' ],
         ['name' => 'Oeuf' ],
         ['name' => 'Poivron' ],
         ['name' => 'Camembert' ],
         ['name' => 'Artichauts' ],
         ['name' => 'Persillade' ],
         ['name' => 'Viande hâché' ],
         ['name' => 'Poulet tex-mex' ],
         ['name' => 'Oignon rouge' ],
         ['name' => 'Sauce BBQ' ],
         ['name' => 'Lamelle de kebab' ],
         ['name' => 'Poulet' ],
         ['name' => 'Magret de canard' ],
         ['name' => 'Foie gras' ],
         ['name' => 'Lardons' ],
         ['name' => 'Chorizo' ],
         ['name' => 'Merguez' ],
         ['name' => 'Sauce samouraï' ],
         ['name' => 'Thon' ],
         ['name' => 'Potatoes' ],
         ['name' => 'Moutarde' ],
         ['name' => 'Boursin' ],
         ['name' => 'Raclette' ],
         ['name' => 'Jambon de pays' ],
         ['name' => 'Coppa' ],
         ['name' => 'Cheddar' ],
         ['name' => 'Steak façon bouchère' ],
         ['name' => 'Double steak façon bouchère' ],
         ['name' => 'Salade' ],
         ['name' => 'Cornichons' ],
         ['name' => 'Frites' ],
         ['name' => 'Bacon' ],
         ['name' => 'Nutella' ],
         ['name' => 'Base crême' ],
         ['name' => 'Chèvre' ],
         ['name' => 'Sauce au choix' ],
     ]);
    }
}
