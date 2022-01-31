<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advice
 *
 * @ORM\Table(name="advice", indexes={@ORM\Index(name="ADVICE_OFFER0_FK", columns={"id_offer"}), @ORM\Index(name="ADVICE_USER_FK", columns={"id_user"})})
 * @ORM\Entity(repositoryClass= "App\Repository\AdviceRepository")
 */
class Advice
{
    /**
     * @var int
     *
     * @ORM\Column(name="advice_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adviceId;

    /**
     * @var bool
     *
     * @ORM\Column(name="rating", type="boolean", nullable=false)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="advice_date", type="date", nullable=false)
     */
    private $adviceDate;

    /**
     * @var \Offer
     *
     * @ORM\ManyToOne(targetEntity="Offer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offer", referencedColumnName="id_offer")
     * })
     */
    private $idOffer;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;


}
