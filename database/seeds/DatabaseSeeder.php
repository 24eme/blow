<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION C3","equipment"=>"TV","capacity"=>"5","eventColor"=>"#a2cbf5"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION TA34","equipment"=>"TV","capacity"=>"12","eventColor"=>"#8a9482"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION","equipment"=>"TV","capacity"=>"20","eventColor"=>"#e3b2a1"]);
      DB::table("rooms")->insert(["title"=>"SALLE DES FETES 203","equipment"=>"TV","capacity"=>"23","eventColor"=>"#fac800"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 459","equipment"=>"TV","capacity"=>"40","eventColor"=>"#f5e4d5"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 345","equipment"=>"TV","capacity"=>"10","eventColor"=>"#ff5ea4"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 975","equipment"=>"TV","capacity"=>"7","eventColor"=>"#ff672b"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 325","equipment"=>"TV","capacity"=>"12","eventColor"=>"#88f77c"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 342","equipment"=>"TV","capacity"=>"32","eventColor"=>"#e2bfff"]);
      //$this->call(DatabaseSeeder::class);
    }
}
