<?php

namespace App\Controller;
use Plugo\Controller\AbstractController;

class MainController extends AbstractController {

    public function home(){
        return $this->renderView('main/home.php');
    }

    public function privacy(){
        return $this->renderView('main/privacy.php');
    }
}
