<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Orders;
use AppBundle\Form\OrderItemType;
use Symfony\Component\Form\Extension\Core\Type\{CollectionType,SubmitType,TextType,IntegerType};

class OrdersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('customerName',TextType::class,[
                    'attr' => array('class' => 'col-8')
                ])
                ->add('customerMobile', TextType::class,[
                    'attr' => array('class' => 'col-8')
                ])
                ->add('orderItems',CollectionType::class,[
                    'entry_type' => OrderItemType::class,
                    'entry_options' => ['label' => false],
                    'allow_add' => true,
                    'allow_delete' => true,
                    'label' => ' ',
                ])
                // ->add('total')
                // ->add('created')
                // ->add('updated')
                ->add('save', SubmitType::class,[
                    'attr' => [
                        'class' => 'btn btn-success order-button mt1'
                    ]
                ])
                ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Orders'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_orders';
    }


}
