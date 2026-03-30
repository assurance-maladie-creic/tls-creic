<?php

namespace App\Controller;

use App\DTO\PreInscriptionDTO;
use App\Enum\InformationsComplementairesEnum;
use App\Form\PreInscriptionType;
use App\Security\CaptchaCheck;
use App\Security\EmailVerifier;
use App\Service\DocumentsCreator;
use App\Twig\AppExtension;
use ...;

#[Route('/{_locale}/inscription', name: 'inscription.')]
class InscriptionController extends AbstractController
{
    public function __construct(
        private HttpClientInterface $httpClient,
    ) {
    }

    #[Route('/pre-inscription', name: 'pre_inscription')]
    public function preInscription(
        Request $request,
        ...,
    ): Response {
        $preInscriptionDTO = new PreInscriptionDTO();

        // ...

        $form = $this->createForm(PreInscriptionType::class, $preInscriptionDTO, [
            'label' => false,
        ]);
        $form->handleRequest($request);

        // ...


        if ($form->isSubmitted() && $form->isValid()) {

            // ...


            return $this->redirectToRoute('inscription.email_envoye');

        }

        // ...

        return $this->render('inscription/pre_inscription.html.twig', [
            'form' => $form->createView(),
            'url' => $this->getParameter('url_captcha'),
            '...' => '...',
        ]);
    }

    // ...

}
