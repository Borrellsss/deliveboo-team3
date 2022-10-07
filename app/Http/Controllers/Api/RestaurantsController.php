<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\CategoryUser;

class RestaurantsController extends Controller
{
    public function getRestaurantsByCategory(Request $request) {
        $user_data = $request->all();
        // dd($user_data)

        if(isset($user_data['categories'])) {
            
            $categories = explode(',', $user_data['categories']);
            
            for($i = 0; $i < count($categories); $i++) {
                $categories[$i] = intval($categories[$i]);
            }

            $restaurants = User::with('categories')->get()->toArray();

            $filtered_restaurants = [];

            foreach($restaurants as $restaurant) {

                $category_matched = 0;

                foreach($restaurant['categories'] as $category) {
                    
                    if(in_array($category['id'], $categories)) {
                        ++$category_matched;
                    }
                }
                if(count($categories) === $category_matched) {
                    $filtered_restaurants[] = $restaurant;
                }
            }

            $data = [
                'success' => true,
                'results' => $filtered_restaurants,
            ];

        } else {
            $data = [
                'success' => 'nothing clicked',
                'results' => [],
            ];
        }

        return response()->json($data);
    }   
}
