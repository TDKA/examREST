<?php 

namespace Controllers;


class User extends Controller {


    protected $modelName = \Model\User::class;


/**
 * 
 * 
 * 
 */
public function login() {
    
    if (!empty($_POST['username']) && !empty($_POST['password'])){
          
               $newUser = new \Model\User();  

            $setPassword = htmlspecialchars($_POST['password']);
            
          $newUser->username = htmlspecialchars($_POST['username']);

        $newUser->setPassword($setPassword);

            if($this->model->signIn($newUser) )  {

                \Http::redirect('index.php');
            } 
            else {
                die("Sorry problem");
            }

      }
      else {

        $modelUser = new \Model\User();
        $user = $modelUser->getUser();

        $titlePage = "Login";

        \Rendering::render('users/login', compact('user', 'titlePage'));
        


      }
}

/**
 * 
 * Deconnect user and redirect
 * 
 */
public function logOut() {


    $this->model->signOut();

}

/**
 * 
 * User SIGNUP
 * 
 */
public function register() {


    if( !empty($_POST['usernameSignUp']) && !empty($_POST['passwordSignUp']) && !empty($_POST['emailSignUp'])) {

        $newUser = new \Model\User();      
        
        
        $newUser->username= htmlspecialchars($_POST['usernameSignUp']);
        
        $setPassword = htmlspecialchars($_POST['passwordSignUp']);
        $newUser->setPassword($setPassword);

        $newUser->email = htmlspecialchars($_POST['emailSignUp']);
        
        
        if($this->model->signUp($newUser) )  {
            
            \Http::redirect('index.php?controller=user&task=login');
            
        }else {
            echo "Problem";
        }
        
        
    }else {
        
        $modelUser = new \Model\User();
        $user = $modelUser->getUser();
        
        $titlePage="Sign Up";
    
        \Rendering::render('users/signup', compact('user','titlePage'));
    }
}



}


?>