<?php

namespace App\Controller;

use ...;

class HomeController extends AbstractController
{
    // ...

    #[Route('/{_locale}/situation', name: 'situation')]
    public function situationDemandeur(): Response
    {
        return $this->render('home/situation.html.twig', [
            'home' => true,
        ]);
    }

    // ...


}
