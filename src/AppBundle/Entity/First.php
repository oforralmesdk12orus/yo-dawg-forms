<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * First
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FirstRepository")
 */
class First
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime")
     */
    private $dob;

    /**
     * @var integer
     *
     * @ORM\Column(name="favoriteNumber", type="integer")
     */
    private $favoriteNumber;


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
     * @return First
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
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
     * Set dob
     *
     * @param \DateTime $dob
     * @return First
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set favoriteNumber
     *
     * @param integer $favoriteNumber
     * @return First
     */
    public function setFavoriteNumber($favoriteNumber)
    {
        $this->favoriteNumber = $favoriteNumber;

        return $this;
    }

    /**
     * Get favoriteNumber
     *
     * @return integer 
     */
    public function getFavoriteNumber()
    {
        return $this->favoriteNumber;
    }
}
