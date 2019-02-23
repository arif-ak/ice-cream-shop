<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\{Product,Orders,OrderItem};
use AppBundle\Form\ProductType;
use AppBundle\Form\OrdersType;
use AppBundle\Form\OrderItemType;
use AppBundle\Service\ShopService;

class ShopController extends Controller
{
    protected $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    /**
     * @Route("/", name="shop")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $order = new Orders();
        
        $form = $this->createForm(OrdersType::class, $order);
        $form->handleRequest($request);
        
        if ($form->isSubmitted()){

            $returnData = $this->shopService->saveOrder($order);

            if($returnData){
            
            return $this->render('icecream/success.html.twig', [
                'finalAmount' => $order->getTotal(),
            ]);
            }
            
        }

        return $this->render('icecream/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
