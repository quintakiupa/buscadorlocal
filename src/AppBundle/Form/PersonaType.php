<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class PersonaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, array(
                    'label' => 'Nombre '))

            ->add('apellido', TextType::class, array(
                    'label' => 'Apellidos '))

            ->add('edad', IntegerType::class, array(
                    'label' => 'Edad '))

            ->add('telefono', IntegerType::class, array(
                    'label' => 'Teléfono '))

            ->add('email', EmailType::class, array(
                    'label' => 'E-mail '))
            
            ->add('genero', ChoiceType::class, array(
                'choices'  => array('m' => 'Masculino', 'f' => 'Femenino'),
                'required' => false,
                'label'=>'Género',
                'placeholder' => 'Elija una opción',
                'required' => true))
            ->add('catarroja')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Persona'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_persona';
    }


}
