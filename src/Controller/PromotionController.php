<?php

namespace App\Controller;

use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    #[Route('/promotions', name: 'app_promotion_list')]
    public function list(PromotionRepository $promotionRepository): Response
    {
        $promotions = $promotionRepository->findAll();
        return $this->render('promotion/index.html.twig',[
            "promotions" => $promotions
        ]);
    }

    #[Route('/promotions/{id}', name: 'app_promotion_details', requirements: ['id' => '\d+'])]
    public function promotionDetails(int $id, PromotionRepository $promotionRepository): Response
    {
        $promotion = $promotionRepository->find($id);
        return $this->render('promotion/details.html.twig',[
            "id" => $id,
            "promotion" => $promotion
        ]);
    }
}
