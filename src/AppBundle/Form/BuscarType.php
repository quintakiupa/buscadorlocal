<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// use Symfony\Component\Form\Extension\Core\Type\DateType;

class BuscarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            //->add('fecha')
            //->add('Tipocomercio')
            ->add('criterio',
               'entity', array('label'=> 'Buscar ',
                               'class'=> 'AppBundle:Tipocomercio',
                               'placeholder'=> 'Elegir criterio de búsqueda...',
                               'query_builder' => function ($er) {
 
            return $er->createQueryBuilder('tc')->OrderBy('tc.nombre', 'ASC');
            }

            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Buscar'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_buscar';
    }


}
