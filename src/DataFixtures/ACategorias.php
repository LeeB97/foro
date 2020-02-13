<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ACategorias extends Fixture
{
    public function load(ObjectManager $manager) {

        $categorias = ["Programación", "Cocina", "Ajedrez", "Juegos", "Deportes", "Tapeo"];

        foreach($categorias as $cat_nombre){
            $cat = new Categoria();
            $cat->setNombre($cat_nombre);
            $manager->persist($cat);
        }

        $manager->flush();
    }
}
