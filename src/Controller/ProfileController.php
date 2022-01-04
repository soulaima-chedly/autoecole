<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
        // usually you'll want to make sure the user is authenticated first,
        // see "Authorization" below
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if (!$this->getUser()) {
            return $this->json([
                'auth'  => 'unauthenticated',
            ]);
            // throw new AccessDeniedException('User is not authenticated');
        }

        // returns your User object, or null if the user is not authenticated
        // use inline documentation to tell your editor your exact User class
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        // echo $user;
        // Call whatever methods you've added to your User class
        // For example, if you added a getFirstName() method, you can use that.
        // return $this->json([
        //     'auth'  => $this->getUser(),
        // ]);

        return $this->json(
            $this->getUser(),
            Response::HTTP_OK,
            [],
            [
                // ObjectNormalizer::IGNORED_ATTRIBUTES => ['user'],
                ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                    return $object->getId();
                }
            ]
        );
    }

    // #[Route('/profile', name: 'profile')]
    // public function index(): Response
    // {
    //     return $this->render('profile/index.html.twig', [
    //         'controller_name' => 'ProfileController',
    //     ]);
    // }
}
