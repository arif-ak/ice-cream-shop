<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{TextType,ChoiceType,IntegerType};
use AppBundle\Entity\OrderItem;

class OrderItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
                // ->add('orderId')
                ->add('itemName',ChoiceType::class,[
                    'choices' => OrderItem::$getFlavours,
                    'label' => 'Select flavour:',
                    // 'choices_as_values' => true,
                    'attr' => array('class' => 'col-4 item-name')
                ])
                ->add('itemQuantity',IntegerType::class,[
                    'label' => 'Select number of scoops:',
                    'attr' => array('class' => 'col-4 pull-right item-quantity')
                ])
                ->add('itemCost',IntegerType::class,[
                    'attr' => array('class' => 'col-4 pull-right item-cost','readonly' => true)
                ])
                ->add('toppings',ChoiceType::class,[
                    'choices' => OrderItem::$getToppings,
                    'choices_as_values' => true,
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false,
                    'label_attr' => array(
                        'class' => 'checkbox-inline' 
                    ),
                ])
                // ->add('created')
                ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OrderItem'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_orderitem';
    }


}
