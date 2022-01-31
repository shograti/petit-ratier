<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 *
 * @ORM\Table(name="offer", indexes={@ORM\Index(name="OFFER_USER0_FK", columns={"id_user"}), @ORM\Index(name="OFFER_SHOP1_FK", columns={"osm_id"}), @ORM\Index(name="OFFER_TYPE_FK", columns={"id_type"})})
 * @ORM\Entity(repositoryClass= "App\Repository\OfferRepository")
 */
class Offer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_offer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffer;

    /**
     * @var string
     *
     * @ORM\Column(name="name_offer", type="string", length=255, nullable=false)
     */
    private $nameOffer;

    /**
     * @var string
     *
     * @ORM\Column(name="picture_offer", type="string", length=255, nullable=false)
     */
    private $pictureOffer;

    /**
     * @var string
     *
     * @ORM\Column(name="description_offer", type="string", length=255, nullable=false)
     */
    private $descriptionOffer;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity_offer", type="integer", nullable=false)
     */
    private $quantityOffer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_offer", type="date", nullable=false)
     */
    private $startOffer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_offer", type="date", nullable=false)
     */
    private $endOffer;

    /**
     * @var bool
     *
     * @ORM\Column(name="isValide_offer", type="boolean", nullable=false)
     */
    private $isvalideOffer;

    /**
     * @var float|null
     *
     * @ORM\Column(name="initial_price", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $initialPrice = NULL;

    /**
     * @var float
     *
     * @ORM\Column(name="solded_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $soldedPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="post_date", type="date", nullable=false)
     */
    private $postDate;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_offer", type="string", length=10000, nullable=false)
     */
    private $slugOffer;

    /**
     * @var \Shop
     *
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="osm_id", referencedColumnName="osm_id")
     * })
     */
    private $osm;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type", referencedColumnName="id_type")
     * })
     */
    private $idType;


}
