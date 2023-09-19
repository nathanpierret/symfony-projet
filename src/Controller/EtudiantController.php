<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant_list')]
    public function list(EtudiantRepository $etudiantRepository): Response
    {
        //Appel au modèle
        //Le contrôleur va demander au modèle la liste des étudiants
        $etudiants = $etudiantRepository->findAll();
        //Appel à la vue
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants
        ]);
    }

    #[Route('/etudiants/{id}', name: 'app_etudiant_details')]
    public function etudiantDetails(int $id, EtudiantRepository $etudiantRepository): Response
    {
        $etudiant = $etudiantRepository->find($id);
        return $this->render('etudiant/details.html.twig',[
            "id" => $id,
            "etudiant" => $etudiant
        ]);
    }
}
