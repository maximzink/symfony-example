<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FooControlerController extends Controller
{
    /**
     * @Route("/foo/controler", name="foo_controler")
     */
    public function index()
    {
        return $this->render('foo_controler/index.html.twig', [
            'controller_name' => 'FooControlerController',
        ]);
    }
}
