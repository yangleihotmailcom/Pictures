<?php

namespace Acme\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\TestBundle\Entity\phoneTypes
 */
class phoneTypes
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $typeName
     */
    private $typeName;


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
     * Set typeName
     *
     * @param string $typeName
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;
    }

    /**
     * Get typeName
     *
     * @return string 
     */
    public function getTypeName()
    {
        return $this->typeName;
    }
    
    public function __toString()
    {
    	return $this->getTypeName();
    }
}