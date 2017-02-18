<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tipocomercio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tipocomercio controller.
 *
 */
class TipocomercioController extends Controller
{
    /**
     * Lists all tipocomercio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipocomercios = $em->getRepository('AppBundle:Tipocomercio')->findAll();

        return $this->render('tipocomercio/index.html.twig', array(
            'tipocomercios' => $tipocomercios,
        ));
    }

    /**
     * Creates a new tipocomercio entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipocomercio = new Tipocomercio();
        $form = $this->createForm('AppBundle\Form\TipocomercioType', $tipocomercio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipocomercio);
            $em->flush($tipocomercio);

            return $this->redirectToRoute('tipocomercio_show', array('id' => $tipocomercio->getId()));
        }

        return $this->render('tipocomercio/new.html.twig', array(
            'tipocomercio' => $tipocomercio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipocomercio entity.
     *
     */
    public function showAction(Tipocomercio $tipocomercio)
    {
        $deleteForm = $this->createDeleteForm($tipocomercio);

        return $this->render('tipocomercio/show.html.twig', array(
            'tipocomercio' => $tipocomercio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipocomercio entity.
     *
     */
    public function editAction(Request $request, Tipocomercio $tipocomercio)
    {
        $deleteForm = $this->createDeleteForm($tipocomercio);
        $editForm = $this->createForm('AppBundle\Form\TipocomercioType', $tipocomercio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipocomercio_edit', array('id' => $tipocomercio->getId()));
        }

        return $this->render('tipocomercio/edit.html.twig', array(
            'tipocomercio' => $tipocomercio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipocomercio entity.
     *
     */
    public function deleteAction(Request $request, Tipocomercio $tipocomercio)
    {
        $form = $this->createDeleteForm($tipocomercio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipocomercio);
            $em->flush($tipocomercio);
        }

        return $this->redirectToRoute('tipocomercio_index');
    }

    /**
     * Creates a form to delete a tipocomercio entity.
     *
     * @param Tipocomercio $tipocomercio The tipocomercio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tipocomercio $tipocomercio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipocomercio_delete', array('id' => $tipocomercio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
