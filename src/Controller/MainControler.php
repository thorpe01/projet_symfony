<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainControler extends AbstractController
{

    /**
     * @Route("/" , name="main_home")
     */
    public function home(){

        echo "coucou";
        die();
    }
    /**
     * @Route("/" , name="main_home")
     */
    public function test(){

        echo "testounet";
        die();
    }
}