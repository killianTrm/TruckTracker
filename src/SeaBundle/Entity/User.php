<?php

namespace SeaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Expose;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="SeaBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Expose
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Expose
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Association", inversedBy="users")
     * @ORM\JoinTable(name="users_associations")
     * @Expose
     */
    private $associations;

    /**
     * @var \Date
     *
     * @ORM\Column(name="birthdate", type="date")
     * @Expose
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     * @Expose
     */
    private $mail;

    /**
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address", referencedColumnName="id")
     * @Expose
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Expose
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     * @Expose
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="id_facebook", type="string")
     */
    protected $id_facebook;


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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
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
     * Set address
     *
     * @param Address $address
     *
     * @return User
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
     * Set description
     *
     * @param string $description
     *
     * @return User
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
     * Bind array of data
     *
     * @param array $arrayData
     */
    public function bind($arrayData)
    {

        if(!empty($arrayData['name'])) {
            $this->name = $arrayData['name'];
        }

        if(!empty($arrayData['firstname'])) {
            $this->firstname = $arrayData['firstname'];
        }

        if(!empty($arrayData['address'])) {
            $this->address = new Address();
            $this->address->bind($arrayData['address']);
        }

        if(!empty($arrayData['birthdate'])) {
            $this->birthdate = $arrayData['birthdate'];
        }

        if(!empty($arrayData['mail'])) {
            $this->mail = $arrayData['mail'];
        }

        if(!empty($arrayData['description'])) {
            $this->description = $arrayData['description'];
        }

        if(!empty($arrayData['password'])) {
            $this->password = $arrayData['password'];
        }

        if(!empty($arrayData['id_facebook'])) {
            $this->id_facebook = $arrayData['id_facebook'];
        }

        $this->associations = [];
        if(!empty($arrayData['associations'])) {
            foreach ($arrayData['associations'] as $currentAssociation){
                $association = new User();
                $association->bind($currentAssociation);
                array_push($this->associations, $association);
            }
        }
    }
}

