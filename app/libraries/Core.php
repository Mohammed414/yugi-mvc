<?php 

/* 
App core class
Create URL and loads controllers
URL FORMAT : /controller/method/params
*/

class Core {
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    # Constructor gets the url
    public function __construct()
    {
        /* 
        
        Here we gonna instantiate the current controller.
        If the url has some controller, use it. Else, we would wanna use the 
        default one, Pages.
        */

        // First, get the url array
        $url = $this->getUrl();

        /* Next check if there is a controller file with the same name. 
         We are now in index.php so we look into ../app/controllers
         also make sure to UpperCaseWords by ucwords()
        */
        if(file_exists("../app/controllers/".ucwords($url[0]).".php")){
            $this->currentController = ucwords($url[0]);
            // unset the 0 index (The array keeps its order just removes the 0 index item)
            unset($url[0]);
        }

        // get the controller from it's file. 
        require_once '../app/controllers/'. $this->currentController . ".php";
        // Instantiate the controller in the current controller
        $this->currentController = new $this->currentController;



        /* METHOD IN A CONTROLLER SECTION */

        // * The default method is index

        // check if url has a method or it's just index
        if(isset($url[1])){
            // check if the method is actually a method in the controller
            if(method_exists($this->currentController, $url[1])){
                // the current method will become the new method in the url
                $this->currentMethod = $url[1];
                // unset it 
                unset($url[1]);
            }
        }
        // Now let's get the params
        // if any array items left then they'll just be en empty array
        // we'll use array_values() function to turn the the remaining items in the
        // choped up array to a new array
        $this->params = $url ? array_values($url) : [];

        // Now let's call the method in the controller class with the params 
        // URL : controller/method/...params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);



    }
    public function getUrl(){
        // We need to check if the url is set so we don't get errors
        if(isset($_GET['url'])){
            // Now we need to trim->filter->explode
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);

            return $url;
        }
    }

}


?>