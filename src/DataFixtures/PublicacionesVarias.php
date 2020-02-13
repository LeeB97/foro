<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use App\Entity\Comentario;
use App\Entity\Publicacion;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PublicacionesVarias extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contenidos = ['Esto es lo maximo','Esto es lo peor','Ame estos momentos','Viva la vida','De mal a peor','Mi vida cambio','Prefiero morir','Hasta junio','Hasta septiembre','Necesito dormir mas','Pizza time','Nunca nunca jamas jamas','Aguacates'];
        $comentarios = ['Lo apoyo','Que va','Correcto','Ni loco','TT_TT',':D'];
        $repoCat = $manager->getRepository(Categoria::class);

        $repoUser = $manager->getRepository(User::class);

        $u = $repoUser->findOneBy([
           'username' => 'jorge@asd.es'
        ]);

        $minCat = min($repoCat->findAll())->getId();
        $maxCat = max($repoCat->findAll())->getId();


        foreach ($contenidos as $contenido){
            $p = new Publicacion();

            $random = mt_rand($minCat,$maxCat);
            $c = $repoCat->find($random);


            $p->setCategoria($c);
            $p->setContenido($contenido);
            $p->setTitulo($contenidos[mt_rand(0,count($contenidos)-1)]);
            $p->setFechaPublicacion(new \DateTime("now"));
            $p->setUsuario($u);

            for ($i = 0 ; $i < mt_rand(0,count($comentarios)-1) ; $i++){
                $com = new Comentario();
                $com->setContenido($comentarios[mt_rand(0,count($comentarios)-1)]);
                $com->setFechaPublicacion(new \DateTime('now'));

                $com->setPublicacion($p);
                $com->setUsuario($u);

                $manager->persist($com);
            }

            $manager->persist($p);
        }




        $manager->flush();
    }


}
