<?php

// src/Security/ApiKeyAuthenticator.php
namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ApiKeyAuthenticator extends AbstractLoginFormAuthenticator
{

  function getLoginUrl(Request $request): string
  {
    return "";
  }



  public function authenticate(Request $request): Passport
  {
    $apiToken = $request->headers->get('X-AUTH-TOKEN');
    if (null === $apiToken) {
      // The token header was empty, authentication fails with HTTP Status
      // Code 401 "Unauthorized"
      throw new CustomUserMessageAuthenticationException('No API token provided');
    }

    return new SelfValidatingPassport(new UserBadge($apiToken));
  }

  public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
  {
    // on success, let the request continue
    // return "hey";
    return null;
  }


  // /**
  //  * {@inheritdoc}
  //  *
  //  * Override to change the request conditions that have to be
  //  * matched in order to handle the login form submit.
  //  *
  //  * This default implementation handles all POST requests to the
  //  * login path (@see getLoginUrl()).
  //  */
  // public function supports(Request $request): bool
  // {
  //   return $request->isMethod('POST') && $this->getLoginUrl($request) === $request->getPathInfo();
  // }

  // /**
  //  * Override to change what happens after a bad username/password is submitted.
  //  */
  // public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
  // {
  //   if ($request->hasSession()) {
  //     $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
  //   }

  //   $url = $this->getLoginUrl($request);

  //   return new RedirectResponse($url);
  // }

  // /**
  //  * Override to control what happens when the user hits a secure page
  //  * but isn't logged in yet.
  //  */
  // public function start(Request $request, AuthenticationException $authException = null): Response
  // {
  //   $url = $this->getLoginUrl($request);

  //   return new RedirectResponse($url);
  // }

  // public function isInteractive(): bool
  // {
  //   return true;
  // }
}
