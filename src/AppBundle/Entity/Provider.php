<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProviderRepository")
 */
class Provider
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
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255, nullable=true)
     */
    private $phoneNumber;


    /**
     * @ORM\ManyToMany(targetEntity="Service", mappedBy="provider", cascade={"persist"})
     * @ORM\JoinTable(name="provide_service",
     * joinColumns={@ORM\JoinColumn(name="provider_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="service_id", referencedColumnName="id")}
     * )
     */
    private $service;

    public function __construct () {
        $this->service = new ArrayCollection();
    }

    /**
     * Add services
     *
     * @param \AppBundle\Entity\Service $service
     */
    public function addService(\AppBundle\Entity\Service $service)
    {
        $service->addProvider($this);
        $this->service[] = $service;
    }

    /**
     * Get service
     *
     *
     */
    public function getService()
    {
        return $this->service;
    }

    public function removeService(Service $service) {
        if($this->service->contains($service)) {
            $this->service->removeElement($service);
            $service->removeProvider($this);
        }

        return $this;
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
     * Set name
     *
     * @param string $name
     * @return Provider
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
     * Set location
     *
     * @param string $location
     * @return Provider
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Provider
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
