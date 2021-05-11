<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class atomController extends AbstractController
{
  #[Route('/', name: 'home')]
  public function home(): Response
  {
    if($this->getUser()!=null){ #in_array("ROLE_USER", $this->getUser()->getRoles())==1
      return $this->redirectToRoute('homeConnecte');
    }
    return $this->render('accueil.html.twig');
  }
  #[Route('/accueil', name: 'homeConnecte')]
  public function homeConnecte(): Response
  {
    return $this->render('accueil.html.twig');
  }
  #[Route('/groupes', name: 'groupesTravail')]
  public function groupesTravail(): Response
  {
    return $this->render('accueil.html.twig');
  }
  #[Route('/compte_temps', name: 'compteTemps')]
  public function compteTemps(): Response
  {
    return $this->render('accueil.html.twig');
  }
  #[Route('/espaces', name: 'espaces')]
  public function espaces(): Response
  {
    return $this->render('accueil.html.twig');
  }

}
