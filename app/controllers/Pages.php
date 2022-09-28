<?php 
class Pages {
    public function __construct(){
        
    }
    public function index(){
        echo "This is the index!";
    }
    public function about($id){
        echo "This is about! number ". $id;
    }
}

?>