<?php

// src/EventSubscriber/ExceptionSubscriber.php
namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class AuthSubscriber implements EventSubscriberInterface
{
  private $logger;
  private $security;

  public function __construct(LoggerInterface $logger, Security $security)
  {
    $this->logger = $logger;
    // Avoid calling getUser() in the constructor: auth may not
    // be complete yet. Instead, store the entire Security object.
    $this->security = $security;
  }

  public static function getSubscribedEvents()
  {
    // return the subscribed events, their methods and priorities
    return [
      LoginSuccessEvent::class => 'onLoginSuccess',
      LoginFailureEvent::class => 'onLoginFailure',
      LogoutEvent::class => 'onLogout',
    ];
  }

  public function onLoginSuccess(LoginSuccessEvent $event)
  {


    return $event->setResponse(new Response('Welcome!'));
  }

  public function onLogout(LogoutEvent $event)
  {
    $event->getResponse()->setContent('Logout Success!');
    $event->getResponse()->headers->remove('Location');
    $event->getResponse()->setStatusCode(Response::HTTP_ACCEPTED);
  }

  public function onLoginFailure(LoginFailureEvent $event)
  {

    $event->getResponse()->setStatusCode(Response::HTTP_UNAUTHORIZED);
    $event->getResponse()->setContent('Wrong credentials!');
    $event->getResponse()->headers->remove('Location');
  }
}
