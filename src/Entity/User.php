<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass= "App\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo_user", type="string", length=255, nullable=false)
     */
    private $pseudoUser;

    /**
     * @var string
     *
     * @ORM\Column(name="email_user", type="string", length=255, nullable=false)
     */
    private $emailUser;

    /**
     * @var string
     *
     * @ORM\Column(name="name_user", type="string", length=255, nullable=false)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname_user", type="string", length=255, nullable=false)
     */
    private $firstnameUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate_user", type="date", nullable=false)
     */
    private $birthdateUser;

    /**
     * @var float
     *
     * @ORM\Column(name="distance_user", type="float", precision=10, scale=0, nullable=false)
     */
    private $distanceUser;

    /**
     * @var string
     *
     * @ORM\Column(name="url_img_user", type="string", length=255, nullable=false)
     */
    private $urlImgUser;

    /**
     * @var float
     *
     * @ORM\Column(name="posX_user", type="float", precision=10, scale=0, nullable=false)
     */
    private $posxUser;

    /**
     * @var float
     *
     * @ORM\Column(name="posY_user", type="float", precision=10, scale=0, nullable=false)
     */
    private $posyUser;

    /**
     * @var string
     *
     * @ORM\Column(name="password_user", type="string", length=255, nullable=false)
     */
    private $passwordUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date_user", type="date", nullable=false)
     */
    private $registerDateUser;

    /**
     * @var int
     *
     * @ORM\Column(name="rating_user", type="integer", nullable=false)
     */
    private $ratingUser;

    /**
     * @var string
     *
     * @ORM\Column(name="role_user", type="string", length=20, nullable=false)
     */
    private $roleUser;

    /**
     * @var string
     *
     * @ORM\Column(name="tracker_user", type="string", length=1000, nullable=false)
     */
    private $trackerUser;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_user", type="string", length=30, nullable=false)
     */
    private $ipUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="idUser")
     */
    private $idType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idType = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
