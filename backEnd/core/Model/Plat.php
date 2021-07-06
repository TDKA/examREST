<?php

namespace Model;

use PDO;

class Plat extends Model {

protected $table = "plats";


public $id;
public $name;
public $price;
public $description;
public $restaurant_id;

    /**
     * find all Plat by restaurant ID
     * 
     * @param int $restaurant_id
     * 
     * 
     */

public function findAllByResto(int $restaurant_id) {

        $req = $this-> pdo->prepare("SELECT * FROM plats WHERE restaurant_id = :restaurant_id");

            $req->execute(['restaurant_id' => $restaurant_id]);

            $plats = $req->fetchAll( PDO::FETCH_CLASS, \Model\Plat::class );

            return $plats;
}

    
/**
* Insert NEW Plat
* @param string $name
*@param int $price
* @param string $description
* @param int $restaurant_id

* @return void
*/

public function insert(string $name, int $price, string $description, int $restaurant_id) :void {

    $req = $this->pdo->prepare("INSERT INTO plats(name, price, description, restaurant_id) VALUES(:name, :price, :description, :restaurant_id)" );

    $req->execute([

        'name' => $name,
        'price' =>$price,
        'description' => $description,
        'restaurant_id' => $restaurant_id

    ]);


}


}


