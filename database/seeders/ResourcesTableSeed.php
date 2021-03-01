<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class ResourcesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Route::getRoutes() as $route){

            $nameRoute = $route->getName();

            if($nameRoute){
                Resource::create([
                    'name'      => ucwords(str_replace('.', ' ', $nameRoute)),
                    'resource'  => $nameRoute,
                    'is_menu'   => false
                ]);
            }
        }
    }
}
