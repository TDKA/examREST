<?php

namespace Controllers;

class Restaurant extends Controller {

    protected $modelName = \Model\Restaurant::class;


/**
 * show all restaurants
 * 
 */

public function indexApi() {

    $restaurants = $this->model->findAll($this->modelName);

    header('Access-Control-Allow-Origin: *');

    echo json_encode($restaurants);

}

/**
 * 
 * 
 */
public function showApi() {

        $restaurant_id= null;

        // ctype_digit / empty methods
        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

            $restaurant_id = $_GET['id'];
            
        }

        if(!$restaurant_id) {
            die("Add id in the URL"); 
        }

        /// ******* Find resto ********* ///
        $restaurant = $this->model->find($restaurant_id, $this->modelName);


        ///// ****** Find plat   ***** ///
        $modelPlat = new \Model\Plat();
        $plats = $modelPlat->findAllByResto($restaurant_id); 


        $titlePage = $restaurant->name;
        
    header('Access-Control-Allow-Origin: *');

    echo json_encode([
        'restaurant' => $restaurant,
        'plats' => $plats
        
    ]);
           


}


}

