<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\greaterThan;

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

    #[Route('/etudiants/{id}', name: 'app_etudiant_details',requirements: ['id' => '\d+'])]
    public function etudiantDetails(int $id, EtudiantRepository $etudiantRepository): Response
    {
        $etudiant = $etudiantRepository->find($id);
        return $this->render('etudiant/details.html.twig',[
            "id" => $id,
            "etudiant" => $etudiant
        ]);
    }

    #[Route('/etudiants/mineurs', name: 'app_etudiant_mineurs_list')]
    public function listMineurs(EtudiantRepository $etudiantRepository): Response
    {
        $etudiants = $etudiantRepository->findMineurs2();
        return $this->render('etudiant/index.html.twig',[
            "etudiants" => $etudiants,
            "mineur" => true
        ]);
    }
}
