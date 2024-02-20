<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Repository\FournisseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class FournisseurController extends AbstractController
{
    #[Route('/fournisseur', name: 'app_fournisseur_new')]
    public function new(Request $request, FournisseurRepository $fournisseurRepository): Response
    {
        $fournisseur= new Fournisseur();
        $form= $this->CreateForm(FournisseurType::class, $fournisseur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fournisseurRepository->save($fournisseur, true);
            return $this->redirectToRoute('app_fournisseur_new');
        }

        return $this->render('fournisseur/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

