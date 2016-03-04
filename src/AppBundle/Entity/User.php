<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 01/03/16
 * Time: 17:34
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @Serializer\ExclusionPolicy("all")
 *
 * @ORM\Table("user")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\UserRepository")
 */
class User
{

    /**
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     *
     * @Assert\NotBlank
     * @Assert\Length(min="2", max="50")
     */
    protected $login;

    /**
     * double md5 hashing
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\NotBlank
     * @Assert\Length(min="4", max="500")
     */
    protected $password;

    /**
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Serializer\Expose
     * @Serializer\Groups(groups={"Auth"})
     *
     * @Assert\NotBlank
     * @Assert\Length(min="2", max="100")
     */
    protected $firstname;

    /**
     *
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Serializer\Expose
     * @Serializer\Groups(groups={"Auth"})
     *
     * @Assert\NotBlank
     * @Assert\Length(min="2", max="100")
     */
    protected $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     *
     * @Serializer\Expose
     * @Serializer\Groups(groups={"Auth"})
     *
     * @Assert\Email
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Serializer\Expose
     * @Serializer\Groups(groups={"Auth"})
     *
     * @Assert\NotBlank
     */
    protected $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     *
     * @Serializer\Expose
     * @Serializer\Groups(groups={"Auth"})
     *
     * @Assert\DateTime
     * @Assert\NotBlank
     *
     */
    protected $dateCreation;



    /**
     * @var \DateTime
     *
     *
     * @ORM\Column(type="datetime", nullable=true)
     *
     */
    protected $dateDelete;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param \DateTime $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return \DateTime
     */
    public function getDateDelete()
    {
        return $this->dateDelete;
    }

    /**
     * @param \DateTime $dateDelete
     */
    public function setDateDelete($dateDelete)
    {
        $this->dateDelete = $dateDelete;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }
}