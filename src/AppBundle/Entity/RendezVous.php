<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 *
 * @ORM\Table(name="meeting")
 * @ORM\Entity
 */
class RendezVous
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="text", nullable=false)
     */
    private $heure;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coiffeur", referencedColumnName="id")
     * })
     */
    private $idCoiffeur;

    /**
     * @var \AppBundle\Entity\Card
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Card")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_card", referencedColumnName="id")
     * })
     */
    private $idCard;



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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return RendezVous
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param string $heure
     *
     * @return RendezVous
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return RendezVous
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idCoiffeur
     *
     * @param \AppBundle\Entity\User $idCoiffeur
     *
     * @return RendezVous
     */
    public function setIdCoiffeur(\AppBundle\Entity\User $idCoiffeur = null)
    {
        $this->idCoiffeur = $idCoiffeur;

        return $this;
    }

    /**
     * Get idCoiffeur
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdCoiffeur()
    {
        return $this->idCoiffeur;
    }

    /**
     * Set idCard
     *
     * @param \AppBundle\Entity\Card $idCard
     *
     * @return RendezVous
     */
    public function setIdCard(\AppBundle\Entity\Card $idCard = null)
    {
        $this->idCard = $idCard;

        return $this;
    }

    /**
     * Get idCard
     *
     * @return \AppBundle\Entity\Card
     */
    public function getIdCard()
    {
        return $this->idCard;
    }
}
