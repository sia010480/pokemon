<?php

namespace Ioser\pokemon\ORM;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Account
 *
 * @author Ionut Serbanescu
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="pokemon")
 * */

class Pokemon {
    
     /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name; // it's the email address
    
     /**
     * @ORM\Column(type="string") 
     */
    protected $description;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

}
