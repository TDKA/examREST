<?php

namespace Controllers;

class Example extends Controller {


    protected $modelName = \Model\Exemple::class;



/**
 * 
 * 
 */
public function indexApi() {

    // $examples = $this->model->findAll($this->modelName);

    header('Access-Control-Allow-Origin: *');

    echo json_encode($examples);

}


    /**
     * 
     * show all the examples
     * 
     * index() call ALL the items  - "findAll()" from the db
     */
public function index()  {

        //:::: recupere un user ::::://
        // $modelUser = new \Model\User();
        // $user = $modelUser->getUser();

        // $examples = $this->model->findAll($this->modelName);

        // $titlePage = "Example";
        
        // \Rendering::render("template/template",
        //         compact('user', 'examples', 'titlePage')
        //     );

}



     /**
     * Show ONE Example
     * 
     */
public function show() {

        //::::::::::::: recupere un user :::::::::://
        // $modelUser = new \Model\User();
        // $user = $modelUser->getUser();


        // $example_id= null;


        // ctype_digit / empty methods
        // if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

        //     $example_id = $_GET['id'];
            
        // }

        // if(!$example_id) {
        //     die("Add id in the URL"); 
        // }



        /// ******* Find example ********* ///
        // $objectExample = $this->model->find($example_id, $this->modelName);


        // ///// ****** Find Reccetes   ***** ///
        // $modelOtherExample = new \Model\OtherExample();
        // $otherExamples = $modelOtherExample->findAllByGateau($example_id); 


        // ********* Find MAKES for Example ********** ///

        // $modelMakesExample = new \Model\OtherExample();
        // $makesExample = $modelMakesExample->findAllByGateau($gateau_id);
        
        

        //::::::::::::: TItle of the Page :::::::::://
        // $titlePage = $objectExample->name;

           
        // \Rendering::render("folder/template",

        // compact('user','makesExample','objectExample','otherExamples', 'titlePage')

        // );

}

/**
 * 
 * 
 */
public function showApi() {

         //::::::::::::: recupere un user :::::::::://
        // $modelUser = new \Model\User();
        // $user = $modelUser->getUser();


        // $example_id= null;


        // // ctype_digit / empty methods
        // if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

        //     $example_id = $_GET['id'];
            
        // }

        // if(!$example_id) {
        //     die("Add id in the URL"); 
        // }

        // /// ******* Find EXAMPLE ********* ///
        // $example = $this->model->find($example_id, $this->modelName);


        // ///// ****** Find otherExample   ***** ///
        // $otherExample = new \Model\OtherExample();
        // $dataOtherExample = $modelRecette->findAllByGateau($example_id); 



              //::::::::::::: TItle of the Page :::::::::://
        // $titlePage = $example->name;


        // ********* Find MAKES for EXAMPLE ********** ///
        // $modelMake = new \Model\Make();
        // $exampleMakes = $modelMake->findAllByGateau($example_id);

        
    header('Access-Control-Allow-Origin: *');

    echo json_encode([
        'example' => $example,
        'otherData' => $otherData
    ]);
           


}


     /**
     * 
     * Delete ONE EXAMPLE
     * 
     */
public function suppr() {

        // if(isset($_GET['id'])) {

        //         if(!empty($_GET['id']) && ctype_digit($_GET['id']) ) {

        //         $example_id = $_GET['id'];

        //         if($example_id) {
                
        //             //Check if the gateu exist
        //             $gateau = $this->model->find($example_id, $this->modelName);

        //         if(!$example) {

        //                     die("Désolé mais ce gateua n'existe pas");

        //         }          
        //             //Delete Example

        //                 $this->model->delete($example_id);

        //                 \Http::redirect("index.php?controller=gateau&task=index");
        //         }

        //     }
        // }

}




}




?>