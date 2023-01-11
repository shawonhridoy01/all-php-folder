<?php 



class Home extends Controller{

    public function index($a = "",$b="",$c="a"){
        $model = new Model;
        
    
        // $arr['name'] = "shawon";
        // $arr['age'] = 23;

        // $model->insert($arr);
        $model->delete(3);

        
    
        $this->view("home");
    }

}

