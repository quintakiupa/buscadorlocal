<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// use Symfony\Component\Form\Extension\Core\Type\DateType;

class AnuncioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('fecha')
            ->add('tipoanuncio',
               'entity', array('label'=> 'Fuente ',
                               'class'=> 'AppBundle:Tipoanuncio',
                               'placeholder'=> 'Elegir fuente del anuncio...',
                               'query_builder' => function ($er) {
 
            return $er->createQueryBuilder('ta')->OrderBy('ta.nombre', 'ASC');
            }

            ))

            ->add('titulo')
            ->add('texto')            
            //->add('persona')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Anuncio'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_anuncio';
    }


}
