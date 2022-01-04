<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    // private $logger;

    // public function __construct(LoggerInterface $logger)
    // {
    //     $this->logger = $logger;
    // }

    /**
     * @Route("/login", name="login")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // return $this->json([
        //     'error'          => $error,

        // ]);
        // for ($i = 0; $i < 100; $i++) {
        //     # code...
        //     $this->logger->info('I love Tony Vairelles\' hairdresser.');
        // }

        return $this->render('login/index.html.twig', [

            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    // #[Route('/login_post', name: 'login_failure_route_name', methods: ['POST'])]
    // public function login(AuthenticationUtils $authenticationUtils): Response
    // {
    //     // get the login error if there is one
    //     $error = $authenticationUtils->getLastAuthenticationError();

    //     // last username entered by the user
    //     $lastUsername = $authenticationUtils->getLastUsername();

    //     return $this->json([
    //         'error'         => "fgergerg"

    //     ]);

    //     return $this->render('login/index.html.twig', [

    //         'last_username' => $lastUsername,
    //         'error'         => $error,
    //     ]);
    // }
}
