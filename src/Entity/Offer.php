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



    public function getIdOffer(): ?int
    {
        return $this->idOffer;
    }

    public function getNameOffer(): ?string
    {
        return $this->nameOffer;
    }

    public function setNameOffer(string $nameOffer): self
    {
        $this->nameOffer = $nameOffer;

        return $this;
    }

    public function getPictureOffer(): ?string
    {
        return $this->pictureOffer;
    }

    public function setPictureOffer(string $pictureOffer): self
    {
        $this->pictureOffer = $pictureOffer;

        return $this;
    }

    public function getDescriptionOffer(): ?string
    {
        return $this->descriptionOffer;
    }

    public function setDescriptionOffer(string $descriptionOffer): self
    {
        $this->descriptionOffer = $descriptionOffer;

        return $this;
    }

    public function getQuantityOffer(): ?int
    {
        return $this->quantityOffer;
    }

    public function setQuantityOffer(int $quantityOffer): self
    {
        $this->quantityOffer = $quantityOffer;

        return $this;
    }

    public function getStartOffer(): ?\DateTimeInterface
    {
        return $this->startOffer;
    }

    public function setStartOffer(\DateTimeInterface $startOffer): self
    {
        $this->startOffer = $startOffer;

        return $this;
    }

    public function getEndOffer(): ?\DateTimeInterface
    {
        return $this->endOffer;
    }

    public function setEndOffer(\DateTimeInterface $endOffer): self
    {
        $this->endOffer = $endOffer;

        return $this;
    }

    public function getIsvalideOffer(): ?bool
    {
        return $this->isvalideOffer;
    }

    public function setIsvalideOffer(bool $isvalideOffer): self
    {
        $this->isvalideOffer = $isvalideOffer;

        return $this;
    }

    public function getInitialPrice(): ?float
    {
        return $this->initialPrice;
    }

    public function setInitialPrice(?float $initialPrice): self
    {
        $this->initialPrice = $initialPrice;

        return $this;
    }

    public function getSoldedPrice(): ?float
    {
        return $this->soldedPrice;
    }

    public function setSoldedPrice(float $soldedPrice): self
    {
        $this->soldedPrice = $soldedPrice;

        return $this;
    }

    public function getPostDate(): ?\DateTimeInterface
    {
        return $this->postDate;
    }

    public function setPostDate(\DateTimeInterface $postDate): self
    {
        $this->postDate = $postDate;

        return $this;
    }

    public function getSlugOffer(): ?string
    {
        return $this->slugOffer;
    }

    public function setSlugOffer(string $slugOffer): self
    {
        $this->slugOffer = $slugOffer;

        return $this;
    }

    public function getOsm(): ?Shop
    {
        return $this->osm;
    }

    public function setOsm(?Shop $osm): self
    {
        $this->osm = $osm;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdType(): ?Category
    {
        return $this->idType;
    }

    public function setIdType(?Category $idType): self
    {
        $this->idType = $idType;

        return $this;
    }


}
