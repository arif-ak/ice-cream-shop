<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersRepository")
 */
class Orders
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
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=255)
     */
    private $customerName;

    /**
     * @var int
     *
     * @ORM\Column(name="customer_mobile", type="integer", nullable=true)
     */
    private $customerMobile;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="OrderItem",mappedBy="Orders",cascade={"persist"})
     */
    private $orderItems;


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
     * Set total
     *
     * @param integer $total
     *
     * @return Orders
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Orders
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Orders
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return Orders
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set customerMobile
     *
     * @param integer $customerMobile
     *
     * @return Orders
     */
    public function setCustomerMobile($customerMobile)
    {
        $this->customerMobile = $customerMobile;

        return $this;
    }

    /**
     * Get customerMobile
     *
     * @return int
     */
    public function getCustomerMobile()
    {
        return $this->customerMobile;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add orderItem
     *
     * @param \AppBundle\Entity\OrderItem $orderItem
     *
     * @return Orders
     */
    public function addOrderItem(\AppBundle\Entity\OrderItem $orderItem)
    {
        $this->orderItems[] = $orderItem;
        
        $orderItem->setOrderId($this);

        return $this;
    }

    /**
     * Remove orderItem
     *
     * @param \AppBundle\Entity\OrderItem $orderItem
     */
    public function removeOrderItem(\AppBundle\Entity\OrderItem $orderItem)
    {
        $this->orderItems->removeElement($orderItem);
    }

    /**
     * Get orderItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }


}
