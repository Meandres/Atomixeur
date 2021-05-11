<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cooperateur;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CooperateurFixture extends Fixture
{
  private $passwordEncoder;

  public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
      $this->passwordEncoder = $passwordEncoder;
    }
  public function load(ObjectManager $manager)
  {
    $cooperateur=new Cooperateur();
    $cooperateur->setNom("Meignan--Masson");
    $cooperateur->setPrenom("Ilya");
    $cooperateur->setEmail("ilya@a.com");
    $cooperateur->setEnvoiMail(true);
    $cooperateur->setPassword($this->passwordEncoder->encodePassword($cooperateur, 'mdp'));
    $cooperateur->setRoles(array("ROLE_ADMIN"));
    $manager->persist($cooperateur);

    $manager->flush();
    }
}
