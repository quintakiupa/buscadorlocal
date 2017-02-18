<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ComercioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('posicion', IntegerType::class, array(
                    'label' => 'Posición '))

            ->add('nombre', TextType::class, array(
                    'label' => 'Nombre '))

            ->add('direccion', TextType::class, array(
                    'label' => 'Dirección '))

            ->add('telefono', IntegerType::class, array(
                    'label' => 'Teléfono '))

            ->add('email', EmailType::class, array(
                    'label' => 'E-mail '))

            ->add('web', UrlType::class, array(
                    'label' => 'WEB '))

            //->add('mapa')
            //->add('foto')

            ->add('tipocomercio', 'entity', array(
                    'label'=> 'Categoría ',
                    'class'=> 'AppBundle:Tipocomercio',
                    'placeholder'=> 'Asignar una categoría',
                    'query_builder' => function ($er) {
 
            return $er->createQueryBuilder('tc')->OrderBy('tc.nombre', 'ASC');
            }
                ))

            ->add('persona', 'entity', array(
                    'label'=> 'Cliente',
                    'class'=> 'AppBundle:Persona',
                    'placeholder'=> 'Asignar a cliente...',
                    'query_builder' => function ($er) {
 
            return $er->createQueryBuilder('ps')->OrderBy('ps.nombre', 'ASC');
            }
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Comercio'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_comercio';
    }


}
