<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderItem
 *
 * @ORM\Table(name="order_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderItemRepository")
 */
class OrderItem
{ 
    //saving flavours as class constants along with their cost
    const CHOCOLATE = 4;
    const STRAWBERRY = 5;
    const VANILLA = 3;
    const BUTTERSCOTCH = 6;
    const BLACKCURRENT = 7;

    //array to store all flavours
    public static $getFlavours = array(
        'Chocolate' => self::CHOCOLATE,
        'Strawberry' => self::STRAWBERRY,
        'Vanilla' => self::VANILLA,
        'Butterscotch' => self::BUTTERSCOTCH,
        'Blackcurrent' => self::BLACKCURRENT 
    );

    public static $getToppings = array(
        'Candy' => 'Candy',
        'Sprinkles' => 'Sprinkles',
        'Mint' => 'Mint',
        'Nuts' => 'Nuts'
    );

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
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="orderItems")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="item_name", type="string", length=255)
     */
    private $itemName;

    /**
     * @var int
     *
     * @ORM\Column(name="item_quantity", type="integer")
     */
    private $itemQuantity;

    /**
     * @var int
     *
     * @ORM\Column(name="item_cost", type="integer")
     */
    private $itemCost;

    /**
     * @var string
     *
     * @ORM\Column(name="toppings", type="string", length=500, nullable=true)
     */
    private $toppings;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;


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
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return OrderItem
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set itemName
     *
     * @param string $itemName
     *
     * @return OrderItem
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;

        return $this;
    }

    /**
     * Get itemName
     *
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set itemQuantity
     *
     * @param integer $itemQuantity
     *
     * @return OrderItem
     */
    public function setItemQuantity($itemQuantity)
    {
        $this->itemQuantity = $itemQuantity;

        return $this;
    }

    /**
     * Get itemQuantity
     *
     * @return int
     */
    public function getItemQuantity()
    {
        return $this->itemQuantity;
    }

    /**
     * Set itemCost
     *
     * @param integer $itemCost
     *
     * @return OrderItem
     */
    public function setItemCost($itemCost)
    {
        $this->itemCost = $itemCost;

        return $this;
    }

    /**
     * Get itemCost
     *
     * @return int
     */
    public function getItemCost()
    {
        return $this->itemCost;
    }

    /**
     * Set toppings
     *
     * @param string $toppings
     *
     * @return OrderItem
     */
    public function setToppings($toppings)
    {
        $this->toppings = $toppings;

        return $this;
    }

    /**
     * Get toppings
     *
     * @return string
     */
    public function getToppings()
    {
        return $this->toppings;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return OrderItem
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
}

