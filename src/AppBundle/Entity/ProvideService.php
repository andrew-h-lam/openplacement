<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProvideService
 *
 * @ORM\Table(name="provide_service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvideServiceRepository")
 */
class ProvideService
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Provider", inversedBy="service")
     * @ORM\JoinColumn(name="provider_id", referencedColumnName="id", nullable=FALSE)
     */
    private $providerId;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="provider")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id", nullable=FALSE)
     */
    private $serviceId;


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
     * Set providerId
     *
     * @param integer $providerId
     * @return ProvideService
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;

        return $this;
    }

    /**
     * Get providerId
     *
     * @return integer 
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     * @return ProvideService
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get serviceId
     *
     * @return integer 
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }
}
