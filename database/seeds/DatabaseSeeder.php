<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Style;
use App\Technic;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Style::truncate();
        Technic::truncate();

        factory('App\User', 20)->create();
        factory('App\Artist', 20)->create();
        factory('App\Artwork', 60)->create();
        factory('App\Staffmember', 4)->create();
        factory('App\Blog', 10)->create();
        factory('App\News', 8)->create();
        factory('App\Vacancy', 3)->create();

        $categories = [
            'Architectuur',
            'Cultuur',
            'Dieren',
            'Mensen', 
            'Natuur',
            'Stilleven',

        ];

        foreach($categories as $category) 
        {
            Category::create(['name'=>$category]);
        }

        $technics = [
            'Schilderijen en tekeningen',
            'fotografie',
            'grafiek',
            'prints',
            'objecten',
            'overige',
        ];

        foreach($technics as $technic) 
        {
            Technic::create(['name'=>$technic]);
        }


        $styles = [
            'realisme', 
            'impressionisme',
            'figuratief',
            'abstract',
        ];

        foreach($styles as $style) 
        {
            Style::create(['name'=>$style]);
        }

        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);

        $admin = User::create([
            'name'=>'admin',
            'email'=>'g.machielsen@gmail.com',
            'password'=>bcrypt('Bartje83!'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);
    }
}
