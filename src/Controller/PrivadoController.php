<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrivadoController extends AbstractController
{
    /**
     * @Route("/privado", name="privado")
     */
    public function index()
    {
        return $this->render('privado/index.html.twig', [
            'controller_name' => 'PrivadoController',
        ]);
    }
}
