<?php

namespace App\Filters\Artwork;

use App\Filters\FiltersAbstract;
use App\Category;
use App\Technic;
use App\Style;

use App\Filters\Artwork\{

    CategoryFilter,
    TypeFilter,
    TechnicFilter,
};

class ArtwrokFilters extends FiltersAbstract
{
    /**
     * Default course filters.
     *
     * @var array
     */
    protected $filters = [
        'category' => CategoryFilter::class,
        'type' => TypeFilter::class,
        'technic' => TechnicFilter::class
    ];

    /**
     * Mappings for course filter values.
     *
     * @return array
     */
    public static function mappings()
    {
        $map = [
            'category' => Category::get()->pluck('name', 'slug')->toArray(),
            'type' => Type::get()->pluck('name')->toArray(),
            'technic' => Technic::get()->pluck('name')->toArray(),
        ];

        dd($map);

        return $map;
    }
}
