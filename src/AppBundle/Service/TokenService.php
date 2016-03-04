<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 02/03/16
 * Time: 10:30
 */

namespace AppBundle\Service;


use AppBundle\Entity\User;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\Signer\Key;

class TokenService
{
    /**
     * @var Builder
     */
    protected $jwtBuilder;

    /**
     * @var Sha256
     */
    protected $jwtSigner;

    /**
     * @var Key
     */
    protected $jwtKey;

    /**
     * TokenService constructor.
     * @param Builder $jwtBuilder
     * @param Sha256 $jwtSigner
     * @param Key $jwtKey
     */
    public function __construct(Builder $jwtBuilder, Sha256 $jwtSigner, Key $jwtKey)
    {
        $this->jwtBuilder = $jwtBuilder;
        $this->jwtSigner = $jwtSigner;
        $this->jwtKey = $jwtKey;
    }


    public function getToken(User $user) {

        return $this
                ->jwtBuilder
                ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                ->setExpiration(time() + 3600) // Configures the expiration time of the token (exp claim)
                ->set('login', $user->getLogin()) // Configures a new claim, called "uid"
                ->set('firstname', $user->getFirstname()) // Configures a new claim, called "uid"
                ->set('lastname', $user->getSurname()) // Configures a new claim, called "uid"
                ->set('email', $user->getEmail()) // Configures a new claim, called "uid"
                ->set('date_creation', $user->getDateCreation()->format("Y-m-d")) // Configures a new claim, called "uid"
                ->set('role', $user->getRole()) // Configures a new claim, called "uid"
                ->sign($this->jwtSigner,  $this->jwtKey) // creates a signature using your private key
                ->getToken(); // Retrieves the generated token
    }
}