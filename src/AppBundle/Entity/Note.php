<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="note_user_fk", columns={"id_user"})})
 * @ORM\Entity
 */
class Note
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
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var \AppBundle\Entity\RendezVous
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RendezVous")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rdv", referencedColumnName="id")
     * })
     */
    private $idRdv;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
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
     * Set note
     *
     * @param integer $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

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
     * Set commentaire
     *
     * @param text $commentaire
     *
     * @return Note
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return text
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set idRdv
     *
     * @param \AppBundle\Entity\RendezVous $idRdv
     *
     * @return Note
     */
    public function setIdRdv(\AppBundle\Entity\RendezVous $idRdv = null)
    {
        $this->idRdv = $idRdv;

        return $this;
    }

    /**
     * Get idRdv
     *
     * @return \AppBundle\Entity\RendezVous
     */
    public function getIdRdv()
    {
        return $this->idRdv;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Note
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
     * @param \AppBundle\Entity\User $idUser
     *
     * @return Note
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
}
