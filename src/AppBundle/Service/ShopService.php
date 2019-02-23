<?php

namespace AppBundle\Service;

use AppBundle\Repository;
use AppBundle\Entity\{Orders,OrderItem};
use Symfony\Component\DependencyInjection\ContainerInterface;

class ShopService
{
    public function __construct(ContainerInterface $container)
    {
        $this->em = $container->get('doctrine')->getManager();
    }

    public function saveOrder($order)
    {
        $total = 0; //to store total sum of all flavours

        foreach ($order->getOrderItems() as $item){
            $total = $total + $item->getItemCost();
            $item->setOrderId($order);

            //finding flavour name based on item cost, coming from frontend
            $item->setItemName(array_search($item->getItemName(),OrderItem::$getFlavours));
            
            //imploding array of toppings and separating them using coma, to store these values as single string value
            $toppings = implode(", ",$item->getToppings());
            $item->setToppings($toppings);

        }
        $order->setCreated(new \DateTime());
        $order->setUpdated(new \DateTime());
        $order->setTotal($total);
        $this->em->persist($order);
        $this->em->flush();    

        return true; //true on successful persist, TODO - error scenarios to be covered
    }
}

