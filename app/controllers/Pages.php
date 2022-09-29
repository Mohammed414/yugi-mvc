<?php 
class Pages extends Controller {
    public function __construct(){
        
    }
    public function index(){
        $data = [
            "title" => "28th Sep 2022" 
        ];
        $this->view("pages/index", $data);
    }
    public function about(){
        $this->view('pages/about');
        
    }
}

?>