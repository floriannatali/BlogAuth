<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 02/03/16
 * Time: 10:12
 */

namespace AppBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AccessToken
 * @package AppBundle\Model
 *
 */
class AccessToken
{

    /**
     * The JWT token
     *
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("token")
     * @JMS\Groups(groups={"Auth"})
     */
    protected $token;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
}