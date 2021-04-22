<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table(name="user")
  */
class User implements  UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $email;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }    

    public function getSalt() {
        #return $this->salt;
    }


  public function getRoles()
    {
        return array('ROLE_USER');
    }
    
    public function eraseCredentials()
    {
        
    }
    
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }
    
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }  
}
