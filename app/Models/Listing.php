<?php

namespace App\Models;

class Listing {
    public static function all(){
        return [
            
                [
                    "id"=> 1,
                    "name"  => "Listing One",
                    "details" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit consequatur alias tempora officia, voluptate soluta nobis consequuntur maxime rem velit a ab sit, minima, voluptatem neque odit necessitatibus sunt officiis!"
                ],
                [
                    "id"=> 2,
                    "name"  => "Listing Two",
                    "details" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit consequatur alias tempora officia, voluptate soluta nobis consequuntur maxime rem velit a ab sit, minima, voluptatem neque odit necessitatibus sunt officiis!"
                ],
            
            ];
    }

    public static function findOne($id){
       
            $listings = self::all();

            foreach($listings as $listing){
                if($listing['id'] == $id){
                    return $listing;
                }

            }
    }
}