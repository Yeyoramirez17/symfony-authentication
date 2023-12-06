<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return match ( $this->getUser()->isVerified() ) {
            true => $this->render('dashboard/index.html.twig'),
            false => $this->render('security/verify_email.html.twig'),
        };
    }
}
