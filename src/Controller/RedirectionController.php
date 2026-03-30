<?php

namespace App\Controller;

use ...;

#[Route('/{_locale}/redirection', name: 'redirection.')]
class RedirectionController extends AbstractController
{
    #[Route('/caisse', name: 'caisse')]
    public function caisse(Request $request): Response
    {

        $situation = $request->query->get('situation');
        $nationalite = $request->query->get('nationalite');
        $paysSalarie = $request->query->get('pays-salarie');
        $paysTravailleurIndependant = $request->query->get('pays-travailleur-independant');
        $paysIndemnisationChomage = $request->query->get('pays-indemnisation-chomage');

        return $this->render('redirection/caisse.html.twig', [
            'situation' => $situation,
            'nationalite' => $nationalite,
            'pays_salarie' => $paysSalarie,
            'pays_travailleur_independant' => $paysTravailleurIndependant,
            'pays_indemnisation_chomage' => $paysIndemnisationChomage,
        ]);
    }

    // ...

}
