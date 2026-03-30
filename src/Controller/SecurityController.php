<?php

namespace App\Controller;

use ...;

#[Route('/{_locale}')]
class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'connexion')]
    public function login(): Response
    {
        // ...

        return $this->render('security/login.html.twig', [
            '...' => '...',
        ]);
    }

    #[Route('/deconnexion', name: 'deconnexion')]
    public function logout(): void
    {
    }
}
