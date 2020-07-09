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
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION C3","equipment"=>"TV","capacity"=>"5","eventColor"=>"#a2cbf5","image"=>'1.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION TA34","equipment"=>"Video-projecteur","capacity"=>"12","eventColor"=>"#8a9482","image"=>'2.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION","equipment"=>"Micro","capacity"=>"20","eventColor"=>"#e3b2a1","image"=>'3.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DES FETES 203","equipment"=>"Tableau","capacity"=>"23","eventColor"=>"#fac800","image"=>'4.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 459","equipment"=>"Ecran LCD,Ecran Plasma","capacity"=>"40","eventColor"=>"#f5e4d5","image"=>'5.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 345","equipment"=>"Billard","capacity"=>"10","eventColor"=>"#ff5ea4","image"=>'6.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 975","equipment"=>"Piste de danse","capacity"=>"7","eventColor"=>"#ff672b","image"=>'7.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 325","equipment"=>"TV","capacity"=>"12","eventColor"=>"#88f77c","image"=>'8.jpg']);
      DB::table("rooms")->insert(["title"=>"SALLE DE REUNION 342","equipment"=>"TV","capacity"=>"32","eventColor"=>"#e2bfff","image"=>'1.jpg']);


      DB::table('events')->insert(["title"=>"testisReserved","start"=>"2020-06-08T08:00Z","end"=>"2020-06-08T09:00Z","resourceId"=>"1","user_id"=>"1","confirmed"=>true]);
      DB::table("events")->insert(["title"=>"réservation 1","start"=>"2020-07-01T08:00:00Z","end"=>"2020-07-01T10:00:00Z","resourceId"=>"1","user_id"=>"1","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 2","start"=>"2020-06-29T08:00:00Z","end"=>"2020-06-29T10:00:00Z","resourceId"=>"2","user_id"=>"2","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 3","start"=>"2020-06-30T18:00:00Z","end"=>"2020-06-30T20:00:00Z","resourceId"=>"3","user_id"=>"1","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 4","start"=>"2020-07-01T08:00:00Z","end"=>"2020-07-01T10:00:00Z","resourceId"=>"4","user_id"=>"2","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 5","start"=>"2020-07-02T14:00:00Z","end"=>"2020-07-02T15:00:00Z","resourceId"=>"5","user_id"=>"3","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 6","start"=>"2020-06-29T14:00:00Z","end"=>"2020-06-29T15:00:00Z","resourceId"=>"6","user_id"=>"2","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 7","start"=>"2020-06-30T08:00:00Z","end"=>"2020-06-30T10:00:00Z","resourceId"=>"7","user_id"=>"1","confirmed"=>false]);
      DB::table("events")->insert(["title"=>"réservation 8","start"=>"2020-06-30T14:00:00Z","end"=>"2020-06-30T15:00:00Z","resourceId"=>"8","user_id"=>"3","confirmed"=>false]);

      // $this->call(UserSeeder::class);

    }
}
