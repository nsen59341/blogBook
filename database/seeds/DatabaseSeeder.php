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
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->delete();
        // DB::table('posts')->delete();
        // $this->call(UsersTableSeeder::class);
        factory('App\User',5)->create()->each(
        	function($u){
        		// $u->save(factory('App\Post')->make());
                factory(App\Post::class)->create(['user_id' => $u->id]);
        });

        
    }
}
