<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace My\UserBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;

    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;

    /** @ORM\Column(name="vkontakte_id", type="string", length=255, nullable=true) */
    protected $vkontakte_id;

    /** @ORM\Column(name="vkontakte_access_token", type="string", length=255, nullable=true) */
    protected $vkontakte_access_token ;

    /**
     * @ORM\Column(type="string")
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    public function getFacebookId() {
        return $this->facebook_id;
    }

    public function getFacebookAccessToken() {
        return $this->facebook_access_token;
    }

    public function getVkontakteId() {
        return $this->vkontakte_id;
    }

    public function getVkontakteAccessToken() {
        return $this->vkontakte_access_token ;
    }

    public function setFacebookId($facebook_id) {
        $this->facebook_id = $facebook_id;

        return $this;
    }

    public function setFacebookAccessToken($facebook_access_token) {
        return $this->facebook_access_token = $facebook_access_token;
    }

    public function setVkontakteId($vkontakte_id) {
        return $this->vkontakte_id = $vkontakte_id;
    }

    public function setVkontakteAccessToken($vkontakte_access_token) {
        return $this->vkontakte_access_token = $vkontakte_access_token ;
    }

    public function __construct() {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_USER');
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday) {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday() {
        return $this->birthday;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry() {
        return $this->country;
    }

}
