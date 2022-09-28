<?php
/*
* This is the base controller class 
* Loads the model and the views

** Every controller will extends this class
*/

class Controller {
    /**
     * Basically, the controller class will be extended by every other controller class
     * out there. This base controller class has two main important methods
     * which are:
     * 1- model
     * 2- views
     * these will be the main ingredients for a webpage 
     */

     public function model($model){
        // require the model to use it
        require_once "../app/models/" . $model .".php";

        // Instantiate the model
        $model_object = new $model();
        // become for example, $post_object = new Posts();
        
        return $model_object;
    }

    public function view($view, $data = []){
        // Data is just the values that will be replaced in the placeholders
        // check if the view actually exists
        if(file_exists("../app/views/" . "$view" . ".php")){
            require_once "../app/views/" . "$view" . ".php";
            
        } else {
            die("View does not exist.");
        }
    }
}

?>