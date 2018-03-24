<?php

namespace App\Entity;

use \Datetime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * use B-crypt
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registrationDate;

    /**
    * @ORM\Column(name="url_token", type="string", length=255, nullable=true)
    */
    protected $urlToken = null;

    public function __construct (
        $firstName = null,
        $lastName = null, 
        $email = null, 
        $password = null,
        $isActive = true,
        $roles = [],
        $urlToken = null
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email; 
        $this->password = $password;
        $this->isActive = $isActive;
        $this->roles = $roles;
        $this->urlToken = $urlToken;

        $this->registrationDate = new DateTime(); 
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get use B-crypt
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of isActive
     */ 
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Get the value of registrationDate
     */ 
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Get the value of urlToken
     */ 
    public function getUrlToken()
    {
        return $this->urlToken;
    }
}
