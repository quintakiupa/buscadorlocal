<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tipoanuncio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tipoanuncio controller.
 *
 */
class TipoanuncioController extends Controller
{
    /**
     * Lists all tipoanuncio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoanuncios = $em->getRepository('AppBundle:Tipoanuncio')->findAll();

        return $this->render('tipoanuncio/index.html.twig', array(
            'tipoanuncios' => $tipoanuncios,
        ));
    }

    /**
     * Creates a new tipoanuncio entity.
     *
     */
    public function newAction(Request $request)
    {
        $tipoanuncio = new Tipoanuncio();
        $form = $this->createForm('AppBundle\Form\TipoanuncioType', $tipoanuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoanuncio);
            $em->flush($tipoanuncio);

            return $this->redirectToRoute('tipoanuncio_show', array('id' => $tipoanuncio->getId()));
        }

        return $this->render('tipoanuncio/new.html.twig', array(
            'tipoanuncio' => $tipoanuncio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tipoanuncio entity.
     *
     */
    public function showAction(Tipoanuncio $tipoanuncio)
    {
        $deleteForm = $this->createDeleteForm($tipoanuncio);

        return $this->render('tipoanuncio/show.html.twig', array(
            'tipoanuncio' => $tipoanuncio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tipoanuncio entity.
     *
     */
    public function editAction(Request $request, Tipoanuncio $tipoanuncio)
    {
        $deleteForm = $this->createDeleteForm($tipoanuncio);
        $editForm = $this->createForm('AppBundle\Form\TipoanuncioType', $tipoanuncio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipoanuncio_edit', array('id' => $tipoanuncio->getId()));
        }

        return $this->render('tipoanuncio/edit.html.twig', array(
            'tipoanuncio' => $tipoanuncio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tipoanuncio entity.
     *
     */
    public function deleteAction(Request $request, Tipoanuncio $tipoanuncio)
    {
        $form = $this->createDeleteForm($tipoanuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoanuncio);
            $em->flush($tipoanuncio);
        }

        return $this->redirectToRoute('tipoanuncio_index');
    }

    /**
     * Creates a form to delete a tipoanuncio entity.
     *
     * @param Tipoanuncio $tipoanuncio The tipoanuncio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tipoanuncio $tipoanuncio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoanuncio_delete', array('id' => $tipoanuncio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
