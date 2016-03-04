<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\User;
use AppBundle\Model\AccessToken;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 *
 * @package AppBundle\Controller\Api
 *
 * @Route("/auth", name="api_auth")
 */
class AuthController extends FOSRestController
{
    /**
     *
     * @ApiDoc(
     *  section = "Auth",
     *  resource = true,
     *  description="Return a token if login / password couple OK",
     *  output="AppBundle\Model\AccessToken",
     *  statusCodes={
     *         200="Returned when successful login",
     *         403="Returned when the user is not authorized"
     *     }
     * )
     *
     * @Rest\View(serializerGroups={ "Auth" })
     *
     * @Rest\Get("/get-token/{login}/{password}",name="api_auth_get_token",requirements={
     * "login": "[a-zA-Z0-9-]+",
     * "password": "[a-zA-Z0-9-]+"
     * })
     */
    public function getTokenAction($login, $password)
    {
        $user = $this
            ->get('doctrine.orm.default_entity_manager')
            ->getRepository('AppBundle\Entity\User')
            ->findOneBy([
                'login' => $login,
                'password' => md5($password),
                'dateDelete' => null
            ])
        ;

        if( $user !== null ) {
            $token = new AccessToken();
            $token->setToken($this->get('app_bundle.token_service')->getToken($user));
            return $token;
        }

        throw new AuthenticationException("Bad login/password couple!");
    }
}
