<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comercio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comercio controller.
 *
 */
class ComercioController extends Controller
{
    /**
     * Lists all comercio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comercios = $em->getRepository('AppBundle:Comercio')->findAll();

        return $this->render('comercio/index.html.twig', array(
            'comercios' => $comercios,
        ));
    }

    /**
     * Creates a new comercio entity.
     *
     */
    public function newAction(Request $request)
    {
        $comercio = new Comercio();
        $form = $this->createForm('AppBundle\Form\ComercioType', $comercio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // Copia el telçefono en los campos mapa y foto
            $comercio->setMapa($comercio->getTelefono());
            $comercio->setFoto($comercio->getTelefono());

            $em->persist($comercio);
            $em->flush($comercio);

            return $this->redirectToRoute('comercio_show', array('id' => $comercio->getId()));
        }

        return $this->render('comercio/new.html.twig', array(
            'comercio' => $comercio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comercio entity.
     *
     */
    public function showAction(Comercio $comercio)
    {
        $deleteForm = $this->createDeleteForm($comercio);

        return $this->render('comercio/show.html.twig', array(
            'comercio' => $comercio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comercio entity.
     *
     */
    public function editAction(Request $request, Comercio $comercio)
    {
        $deleteForm = $this->createDeleteForm($comercio);
        $editForm = $this->createForm('AppBundle\Form\ComercioType', $comercio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comercio_edit', array('id' => $comercio->getId()));
        }

        return $this->render('comercio/edit.html.twig', array(
            'comercio' => $comercio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comercio entity.
     *
     */
    public function deleteAction(Request $request, Comercio $comercio)
    {
        $form = $this->createDeleteForm($comercio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comercio);
            $em->flush($comercio);
        }

        return $this->redirectToRoute('comercio_index');
    }

    /**
     * Creates a form to delete a comercio entity.
     *
     * @param Comercio $comercio The comercio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comercio $comercio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comercio_delete', array('id' => $comercio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function listByNomComAction($nombre) {                //, array('id' => 'ASC')
        
        $tcomercios= $this->getDoctrine()->getRepository('AppBundle:Tipocomercio')->findByNombre($nombre, array('id' => 'ASC'));
    
        return $this->render('comercio/listByComercio.html.twig', array('tcomercios'=>$tcomercios));
    
    }

}
