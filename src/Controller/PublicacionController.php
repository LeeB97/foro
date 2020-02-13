<?php

namespace App\Controller;

use App\Entity\Publicacion;
use App\Repository\PublicacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicacionController extends AbstractController
{
    /**
     * @Route("/ultimas", name="ultimas-publicaciones")
     */
    public function index(PublicacionRepository $pr)
    {
        // Preguntar a los modelos
        $publicaciones = $pr->findAll();

        // Pintar en vista
        return $this->render('publicacion/index.html.twig', [
            'listado_publicaciones' => $publicaciones,
        ]);
    }

    /**
     * @Route("/publicacion/{id}", name="publicacion-detalle")
     */
    public function detalle(Publicacion $publicacion)
    {
        return $this->render('publicacion/detalle.html.twig', [
            'publicacion' => $publicacion
        ]);
    }

}
