<?php

namespace App\Controller;

use App\DTO\DemandeDataDTO;
use App\Entity\Demande;
use App\Form\DemandeEditType;
use App\Security\Voter\DemandeVoter;
use ...;

// ...

#[Route('/{_locale}/espace/suivi-demandes', name: 'suivi_demandes.')]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class SuiviDemandesController extends AbstractController
{

    // ...

    #[Route('/{demande}/edit', name: 'edit')]
    #[IsGranted(DemandeVoter::EDIT, subject: 'demande')]
    public function edit(
        Request $request,
        Demande $demande,
        AutoMapperInterface $autoMapper,
        ...,
    ): Response {
        $demandeEditDTO = $autoMapper->map($demande, DemandeDataDTO::class);
        assert($demandeEditDTO instanceof DemandeDataDTO);

        $form = $this->createForm(DemandeEditType::class, $demandeEditDTO);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ...
        }

        // ...

        return $this->render('suivi_demandes/edit.html.twig', [
            'demande_edit' => $demandeEditDTO,
            'demande' => $demande,
            'form' => $form->createView(),
            '...' => '...',
        ]);
    }



    #[Route('/demande/new', name: 'new')]
    #[IsGranted(DemandeVoter::CREATE)]
    public function new(
        Request $request,
        AutoMapperInterface $autoMapper,
        ...,
    ): Response {
        $demande = new Demande();

        // ...

        $demandeEditDTO = $autoMapper->map($demande, DemandeDataDTO::class);
        assert($demandeEditDTO instanceof DemandeDataDTO);

        $form = $this->createForm(DemandeEditType::class, $demandeEditDTO, [
            '...' => '...',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ...
        }

        // ...

        return $this->render('suivi_demandes/new.html.twig', [
            'demande_edit' => $demandeEditDTO,
            'demande' => $demande,
            'contexte' => 'demande_creee_depuis_espace_personnel',
            'form' => $form->createView(),
        ]);
    }

    // ...
}
