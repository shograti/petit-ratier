<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop")
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


}
