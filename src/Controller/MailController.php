<?php

namespace App\Controller;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    #[Route('/mail', name:"mail")]
    public function index(MailerService $mailerService): Response
    {
        $mailerService->sendMail('mmi@iut-troyes.fr', 'Test Service Messagerie', 'Test de mon message');
        return $this->render('mail/index.html.twig', []);

    }
}