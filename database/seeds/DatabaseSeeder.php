<?php

use Illuminate\Database\Seeder;

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
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION TA34","equipment"=>"Video-projecteur","capacity"=>"12","eventColor"=>"#8a9482"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION","equipment"=>"Micro","capacity"=>"20","eventColor"=>"#e3b2a1"]);
      DB::table("rooms")->insert(["title"=>"SALLE DES FETES 203","equipment"=>"Tableau","capacity"=>"23","eventColor"=>"#fac800"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 459","equipment"=>"Ecran LCD,Ecran Plasma","capacity"=>"40","eventColor"=>"#f5e4d5"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 345","equipment"=>"Billard","capacity"=>"10","eventColor"=>"#ff5ea4"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 975","equipment"=>"Piste de danse","capacity"=>"7","eventColor"=>"#ff672b"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 325","equipment"=>"TV","capacity"=>"12","eventColor"=>"#88f77c"]);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 342","equipment"=>"TV","capacity"=>"32","eventColor"=>"#e2bfff"]);

      DB::table("events")->insert(["title"=>"réservation 1","start"=>"2020-07-01T08:00:00Z","end"=>"2020-07-01T10:00:00Z","resourceId"=>"1","user_id"=>"1"]);
      DB::table("events")->insert(["title"=>"réservation 2","start"=>"2020-06-29T08:00:00Z","end"=>"2020-06-29T10:00:00Z","resourceId"=>"2","user_id"=>"2"]);
      DB::table("events")->insert(["title"=>"réservation 3","start"=>"2020-06-30T18:00:00Z","end"=>"2020-06-30T20:00:00Z","resourceId"=>"3","user_id"=>"1"]);
      DB::table("events")->insert(["title"=>"réservation 4","start"=>"2020-07-01T08:00:00Z","end"=>"2020-07-01T10:00:00Z","resourceId"=>"4","user_id"=>"2"]);
      DB::table("events")->insert(["title"=>"réservation 5","start"=>"2020-07-02T14:00:00Z","end"=>"2020-07-02T15:00:00Z","resourceId"=>"5","user_id"=>"3"]);
      DB::table("events")->insert(["title"=>"réservation 6","start"=>"2020-06-29T14:00:00Z","end"=>"2020-06-29T15:00:00Z","resourceId"=>"6","user_id"=>"2"]);
      DB::table("events")->insert(["title"=>"réservation 7","start"=>"2020-06-30T08:00:00Z","end"=>"2020-06-30T10:00:00Z","resourceId"=>"7","user_id"=>"1"]);
      DB::table("events")->insert(["title"=>"réservation 8","start"=>"2020-06-30T14:00:00Z","end"=>"2020-06-30T15:00:00Z","resourceId"=>"8","user_id"=>"3"]);

      DB::table("users")->insert(["name"=>"honorine","email"=>"honorine@gmail.com","email_verified_at"=>"honorine@gmail.com","password"=>"12345678"]);
      DB::table("users")->insert(["name"=>"mame","email"=>"mame@gmail.com","email_verified_at"=>"mame@gmail.com","password"=>"12345678"]);
      DB::table("users")->insert(["name"=>"sidi","email"=>"sidi@gmail.com","email_verified_at"=>"sidi@gmail.com","password"=>"12345678"]);

      // $this->call(UserSeeder::class);

    }
}
