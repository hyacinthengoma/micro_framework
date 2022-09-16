<?php

namespace App\Controller;
use Plugo\Controller\AbstractController;

class MainController extends AbstractController {

    public function home(){
        return $this->renderView('main/home.php',[
            'fruits' =>[
                'poire',
                'pomme',
                'banane'
            ]
        ]);
    }

    public function test(){
        return $this->redirectToRoute('home',[
            'id' =>4,
            'coucou' =>'hello'
        ]);
    }

    public function privacy(){
        return $this->renderView('main/privacy.php');
    }
}
