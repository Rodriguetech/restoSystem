<?php

namespace App\Controller;

use App\Entity\Plat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/plats', name: 'plat')]
    public function index(): Response
    {
        $plats = $this->entityManager->getRepository(Plat::class)->findAll();

        return $this->render('plat/index.html.twig', [
            'plats' => $plats
        ]);
    }
}
