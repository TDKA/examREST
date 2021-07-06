<?php

namespace Controllers;

class Home extends Controller
{

    protected $modelName = \Model\Example::class;


    /**
     * 
     * affiche la liste des gateaux
     */
    public function index()
    
    {
        

           /*  $userModel = new \Model\User();
             $user = $userModel->getUser(); */
        
           


     /*  $donneesExemple = $this->model->findAll($this->modelName); */
         
        $content = "Content Page";

         $titlePage = "Title of the page"; 

        \Rendering::render('home/home', compact('content','titlePage')); 
    }


}   