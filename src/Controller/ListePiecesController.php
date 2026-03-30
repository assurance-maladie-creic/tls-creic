<?php

namespace App\Controller;

use ...;

#[Route('/{_locale}/liste-pieces', name: 'liste_pieces.')]
class ListePiecesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('liste_pieces/index.html.twig');
    }

    // ...
}
