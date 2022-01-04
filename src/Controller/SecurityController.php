<?php

// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class SecurityController extends AbstractController
{
  /**
   * @Route("/logout", name="app_logout", methods={"GET"})
   */
  public function logout(): void
  {
    // return new Response("logout zucc");
    // controller can be blank: it will never be called!
    throw new \Exception('Don\'t forget to activate logout in security.yaml');
  }

  /**
   * @Route("/check_auth", name="check_auth", methods={"GET"})
   */
  public function checkAuth(): Response
  {
    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

    // if (!$this->getUser()) {
    //   return $this->json([
    //     // 'user'  => $user->getUserIdentifier(),
    //     'auth'  => 'unauthenticated',

    //   ]);
    //   // throw new AccessDeniedException('User is not authenticated');
    // }

    return $this->json([
      // 'user'  => $user->getUserIdentifier(),
      'auth'  => 'authenticated',

    ]);
  }
}
