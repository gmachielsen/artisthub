<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Style;
use App\Technic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 20)->create();
        factory('App\Artist', 20)->create();
        factory('App\Artwork', 20)->create();

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
    }
}
