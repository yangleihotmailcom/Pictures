<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TestBundle\Entity\Persons
 */
class Persons
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $firstName
     */
    private $firstName;

    /**
     * @var string $lastName
     */
    private $lastName;

    /**
     * @var string $phoneNum
     */
    private $phoneNum;

    /**
     * @var Acme\TestBundle\Entity\phoneTypes
     */
    private $phoneType;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNum
     *
     * @param string $phoneNum
     */
    public function setPhoneNum($phoneNum)
    {
        $this->phoneNum = $phoneNum;
    }

    /**
     * Get phoneNum
     *
     * @return string 
     */
    public function getPhoneNum()
    {
        return $this->phoneNum;
    }

    /**
     * Set phoneType
     *
     * @param Acme\TestBundle\Entity\phoneTypes $phoneType
     */
    public function setPhoneType(\Acme\TestBundle\Entity\phoneTypes $phoneType)
    {
        $this->phoneType = $phoneType;
    }

    /**
     * Get phoneType
     *
     * @return Acme\TestBundle\Entity\phoneTypes 
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }
}