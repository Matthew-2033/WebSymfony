<?php


namespace App\Form;


use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nome'
            ])
            ->add('borndate', DateType::class, [
                'label' => 'Data de Nascimento',
                'widget' => 'single_text'
            ])
            ->add('cpf')
            ->add('email', EmailType::class)
            ->add('sex', ChoiceType::class, [
                'label' => 'Sexo',
                'choices'=> [
                    'MASCULINO' => 'MASCULINO',
                    'FEMININO' => 'FEMININO'
                ],
                'multiple' => false,
                'expanded' => true
            ]);
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