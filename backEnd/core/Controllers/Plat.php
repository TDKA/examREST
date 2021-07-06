<?php 

namespace Controllers;

class Plat extends Controller {

    protected $modelName = \Model\Plat::class;

    
        /**
         * 
         * Delete Plat
         * 
         */
public function supprApi() {
    
            if( !empty($_POST['id']) && ctype_digit($_POST['id'])  ) {
                
                $plat_id = $_POST['id'];
    
               if(!$plat_id) {
    
                    die("Sorry, you have to add id to the URL");
               } 
    

               $plat = $this->model->find($plat_id, $this->modelName);  
    
               //
               $restaurant_id = $plat->restaurant_id;
    
               if(!$plat) {
    
                    die("Sorry, this plate don't exist");
    
               }
    
          
               $this->model->delete($plat_id);
    
                        header('Access-Control-Allow-Origin: *');
    
                        $message = "Delete was successfull";
    
                        echo json_encode($message);
                     
    
            }
    
}

   

    /**
     * 
     * Create new plat
     * 
     */
public function createApi() {

             $restaurant_id = null;

             if(!empty($_POST['restoID']) && ctype_digit($_POST['restoID']) ) {

                    $restaurant_id = $_POST['restoID'];

                    $titlePage = "Nouveau Plat";

                   if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description'])) {
               
                         $name = $_POST['name'];
                         $price = $_POST['price'];
                         $description = $_POST['description'];

                         $name = htmlspecialchars($name);
                         $price = htmlspecialchars($price);
                         $description = htmlspecialchars($description);

                         $this->model->insert($name, $price, $description, $restaurant_id);
               
                   } 
               }

}



}

 
?>



