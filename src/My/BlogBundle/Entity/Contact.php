<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace My\BlogBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class Contact
{
    /**
     * @Assert\NotBlank()
     */
    protected $name;
    /**
     * @Assert\NotBlank()
     */
    protected $message;
    /**
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    protected $email;
    
      public function getName()
    {
        return $this->name;
    }
    
        public function setName($name)
    {
         $this->name = $name;
    }
    
          public function getMessage()
    {
        return $this->message;
    }
    
        public function setMessage($message)
    {
         $this->message = $message;
    }
    
            public function getEmail()
    {
        return $this->email;
    }
    
        public function setEmail($email)
    {
         $this->email = $email;
    }
    
    
}