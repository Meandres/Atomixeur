<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MonProfilType;

class MonProfilController extends AbstractController
{
    #[Route('/profil', name: 'profil')]
    public function profil(): Response
    {
      $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
      $form=$this->createForm(MonProfilType::class, $this->getUser());
      return $this->render('profil.html.twig', array('form'=>$form->createView(), ));

      #
    }
}
