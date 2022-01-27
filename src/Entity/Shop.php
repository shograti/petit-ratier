<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass= "App\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @var int
     *
     * @ORM\Column(name="osm_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $osmId;

    /**
     * @var string
     *
     * @ORM\Column(name="name_shop", type="string", length=255, nullable=false)
     */
    private $nameShop;

    /**
     * @var float
     *
     * @ORM\Column(name="posY_shop", type="float", precision=10, scale=0, nullable=false)
     */
    private $posyShop;

    /**
     * @var float
     *
     * @ORM\Column(name="posX_shop", type="float", precision=10, scale=0, nullable=false)
     */
    private $posxShop;

    /**
     * @var string|null
     *
     * @ORM\Column(name="schedule_shop", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $scheduleShop = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="shop_logo", type="string", length=255, nullable=false)
     */
    private $shopLogo;

    public function getOsmId(): ?int
    {
        return $this->osmId;
    }

    public function getNameShop(): ?string
    {
        return $this->nameShop;
    }

    public function setNameShop(string $nameShop): self
    {
        $this->nameShop = $nameShop;

        return $this;
    }

    public function getPosyShop(): ?float
    {
        return $this->posyShop;
    }

    public function setPosyShop(float $posyShop): self
    {
        $this->posyShop = $posyShop;

        return $this;
    }

    public function getPosxShop(): ?float
    {
        return $this->posxShop;
    }

    public function setPosxShop(float $posxShop): self
    {
        $this->posxShop = $posxShop;

        return $this;
    }

    public function getScheduleShop(): ?string
    {
        return $this->scheduleShop;
    }

    public function setScheduleShop(?string $scheduleShop): self
    {
        $this->scheduleShop = $scheduleShop;

        return $this;
    }

    public function getShopLogo(): ?string
    {
        return $this->shopLogo;
    }

    public function setShopLogo(string $shopLogo): self
    {
        $this->shopLogo = $shopLogo;

        return $this;
    }


}
