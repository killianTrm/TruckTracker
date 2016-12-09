<?php

namespace SeaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Association
 *
 * @ORM\Table(name="association")
 * @ORM\Entity(repositoryClass="SeaBundle\Repository\AssociationRepository")
 */
class Association
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="OJIdentifier", type="string", length=255, unique=true)
     */
    private $oJIdentifier;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address", referencedColumnName="id")
     */
    private $address;


     /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, unique=true, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var int
     *
     * @ORM\Column(name="phonenumber", type="string", length=50, nullable=true)
     */
    private $phonenumber;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="associations")
     */
    private $users;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validate", type="boolean")
     */
    private $validate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Association
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set oJIdentifier
     *
     * @param string $oJIdentifier
     *
     * @return Association
     */
    public function setOJIdentifier($oJIdentifier)
    {
        $this->oJIdentifier = $oJIdentifier;

        return $this;
    }

    /**
     * Get oJIdentifier
     *
     * @return string
     */
    public function getOJIdentifier()
    {
        return $this->oJIdentifier;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Association
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param Address $address
     *
     * @return Association
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Association
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Association
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Association
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Association
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Association
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set phonenumber
     *
     * @param integer $phonenumber
     *
     * @return Association
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return int
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Bind array of data
     *
     * @param array $arrayData
     */
    public function bind($arrayData)
    {
        $this->users = [];
        $this->validate = false;

        if(!empty($arrayData['id'])) {
            $this->id = $arrayData['id'];
        }

        if(!empty($arrayData['name'])) {
            $this->name = $arrayData['name'];
        }

        if(!empty($arrayData['o_j_identifier'])) {
            $this->oJIdentifier = $arrayData['o_j_identifier'];
        }

        if(!empty($arrayData['description'])) {
            $this->description = $arrayData['description'];
        }

        if(!empty($arrayData['address'])) {
            $this->address = new Address();
            $this->address->bind($arrayData['address']);
        }


        if(!empty($arrayData['category'])) {
            $this->category = new Category();
            $this->category->bind($arrayData['category']);
        }

        if(!empty($arrayData['mail'])) {
            $this->mail = $arrayData['mail'];
        }

        if(!empty($arrayData['website'])) {
            $this->website = $arrayData['website'];
        }

        if(!empty($arrayData['facebook'])) {
            $this->facebook = $arrayData['facebook'];
        }

        if(!empty($arrayData['twitter'])) {
            $this->twitter = $arrayData['twitter'];
        }

        if(!empty($arrayData['phonenumber'])) {
            $this->phonenumber = $arrayData['phonenumber'];
        }

        if(!empty($arrayData['users'])) {
            foreach ($arrayData['users'] as $currentUser){
                $user = new User();
                $user->bind($currentUser);
                array_push($this->users, $user);
            }
        }

        if ($arrayData['validate'] === true){
            $this->validate = true;
        }
    }
}

