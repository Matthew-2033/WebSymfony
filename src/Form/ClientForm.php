<?php


namespace App\Form;


use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('borndate')
            ->add('cpf')
            ->add('email')
            ->add('sex');
    }

    /**
     * @param OptionsResolver $resolver
     *
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        /**
         * Options that control how the form behaves:
         */
       $resolver->setDefaults([
            //This options binds the form to the selected class:
            'data_class' => Client::class
       ]);
    }


}