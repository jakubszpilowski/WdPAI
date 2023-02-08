<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function start(){
        $this->render('login');
    }

    public function sign(){
        $this->render('sign_up');
    }

    public function week(){
        $this->render('week_page');
    }

}