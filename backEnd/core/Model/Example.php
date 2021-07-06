<?php

namespace Model;

class Example extends Model {

    protected $table = "examples";

    public $id;
    public $prop1;
    public $prop2;
    public $prop3;//$user_id




    /**
     * Insert NEW example
     * @param string $prop1
     * @param string $prop2
     * 
     * @return void
     */
public function insert(string $prop1, string $prop2): void{


        $reqAddGateau = $this->pdo->prepare("INSERT INTO examples (prop1, prop2) 
                                        VALUES (:prop1, :prop2)");

        $reqAddGateau->execute([
                                'prop1' => $prop1,
                                'prop2' => $prop2
                              
                            ]);

}

    /**
     * 
     * Edit CE example
     * 
     * @param string $prop1
     * @param string $prop2
     * @param int $id
     * 
     * @return void
     */
public function update(string $prop1, string $prop2, int $id) :void {

    $reqUpdate = $this->pdo->prepare("UPDATE examples SET prop1 = :prop1, prop2 = :prop2 WHERE id = :id");

        $reqUpdate->execute([

            'prop1' => $prop1,
            'prop2' => $prop2,
            'id' => $id
        ]);
        
}

/**
 * 
 * Find the author of the gateau
 * 
 * 
 */
public function findAuthor() {
    
    //return Object of user so i can use findAuthor()->username / email / etc in the template
    
    return  $this->find($this->user_id, \Model\User::class, 'otherTable');

}


}






?>