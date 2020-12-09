<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
// use App\Artist;
// use App\Artwork;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'user_type' => 'customer',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'artist_name' => $name=$faker->name,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'YearOfBirth' => rand(1930, 2002),
        'slug' => str_slug($name),
        'cover_photo' => 'cover/Paard,jpg',
        'profile_photo' => 'avatar/Gijs.jpg', 
        'description' => $faker->paragraph(rand(2, 10)), 
        'website' => $faker->domainName,
        'phone' => $faker->phoneNumber,
        'GSM' => $faker->phoneNumber,
        'full_name' => $name=$faker->name, 
        'postal_code' => $faker->postcode,
        'street_name' => $faker->streetName,
        'house_number' => $faker->buildingNumber,
        'further_address_information' => 'blablalbalal',
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'website' => $faker->url,                           
        'email' => $faker->unique()->safeEmail,
        'approved' => $faker->numberBetween(0,1),
        'shorttext' => $faker->paragraph(rand(2, 10)),
        'company_name' => $faker->company,
        'taxnumber' => $faker->bankAccountNumber,
        'businessnumber' => $faker->bankAccountNumber,
    ];
});

$factory->define(App\Artwork::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'artist_id' => App\Artist::all()->random()->id,
        'picture' => 'artworks/Paard.jpg',
        'status' => rand(0, 1),
        'style_id' => rand(1,5),
        'category_id' => rand(1,4),
        'technic_id' => rand(1,6),
        'rent' => rand(10, 250),
        'price' => rand(10, 20000),
        'title' => $title = $faker->text,
        'slug' => str_slug($title),
        'width' => rand(10, 200),
        'height' => rand(10, 200), 
        'orientation' => rand(1,2), 
        'description' => $faker->paragraph(rand(2, 10)),
        'framed' => rand(1,2),
        'year' => rand(1600, 2020),
    ];
});

$factory->define(App\Staffmember::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => str_slug($faker->name),
        'image' => 'avatar/Gijs.jpg', 
        'phone' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'function' => $faker->jobTitle,
        'description' => $faker->paragraph(rand(2, 10)),
    ];
});


$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'image' => 'avatar/Gijs.jpg', 
        'content' => $faker->paragraph(rand(2, 10)),
    ];
});

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'image' => 'avatar/Gijs.jpg', 
        'content' => $faker->paragraph(rand(2, 10)),
    ];
});

$factory->define(App\Vacancy::class, function (Faker $faker) {
    return [
        'jobtitle' => $faker->text,
        'jobdescription' => $faker->text,
        'slug' => str_slug($faker->title), 
        'type' => 'fulltime',
        'hours' => '38',
    ];
});


