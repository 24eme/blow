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
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION C3","eventColor"=>"#a2cbf5"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION TA34","eventColor"=>"#8a9482"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION","eventColor"=>"#e3b2a1"]);
      DB::table("rooms")->insert(["title"=>"SALLE DES FETES 203","eventColor"=>"#fac800"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 459","eventColor"=>"#f5e4d5"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 345","eventColor"=>"#ff5ea4"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 975","eventColor"=>"#ff672b"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 325","eventColor"=>"#88f77c"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 342","eventColor"=>"#e2bfff"]);
        // $this->call(UserSeeder::class);
    }
}
