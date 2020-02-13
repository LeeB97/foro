<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AUsuario extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $u = new User();
        $u->setUsername("jorge@asd.es");
        $u->setNombrecompleto("Jorge Dueñas Lerín");
        $u->setPassword(
            $this->passwordEncoder->encodePassword($u, '1234')
        );
        $manager->persist($u);

        $manager->flush();

    }
}
