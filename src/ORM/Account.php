<?php

namespace Ioser\pokemon\ORM;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Description of Account
 *
 * @author Ionut Serbanescu
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="account")
 * */

class Account {
    
     /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $loginName; // it's the email address
    
     /**
     * @ORM\Column(type="string") 
     */
    protected $password;
    
       
    function getId() {
        return $this->id;
    }

    function setLoginName($loginName) {
        $this->loginName = $loginName;
    }

    function getLoginName() {
        return $this->loginName;
    }

    public function getPasswordHash()
    {
        return $this->password;
    }

    public function setPasswordHash($passwordHash)
    {
        $this->password = $passwordHash;
    }
    
    public function setPassword($password)
    {
        $this->setPasswordHash(password_hash($password, PASSWORD_DEFAULT));
    }

    function getPassword() {
        return $this->password;
    }

    public function authenticate($password)
    {
        if (password_verify($password, $this->getPasswordHash()))
        {
            if (password_needs_rehash($this->getPasswordHash(), PASSWORD_DEFAULT))
            {
                $this->setPassword($password);
            }
            return true;
        }

        return false;
    }

}

