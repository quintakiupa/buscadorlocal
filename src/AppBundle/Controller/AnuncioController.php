<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Anuncio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Anuncio controller.
 *
 */
class AnuncioController extends Controller
{
    /**
     * Lists all anuncio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anuncios = $em->getRepository('AppBundle:Anuncio')->findAll();

        return $this->render('anuncio/index.html.twig', array(
            'anuncios' => $anuncios,
        ));
    }

    /**
     * Creates a new anuncio entity.
     *
     */
    public function newAction(Request $request)
    {
        $anuncio = new Anuncio();
        $form = $this->createForm('AppBundle\Form\AnuncioType', $anuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // Las siguientes tres líneas meten la fecha de ese momento en la base de datos automaticamente
            $hoy = date("d-m-Y");
            $anuncio->setFecha($hoy);

            $em->persist($anuncio);
            $em->flush($anuncio);

            return $this->redirectToRoute('anuncio_show', array('id' => $anuncio->getId()));
        }

        return $this->render('anuncio/new.html.twig', array(
            'anuncio' => $anuncio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a anuncio entity.
     *
     */
    public function showAction(Anuncio $anuncio)
    {
        $deleteForm = $this->createDeleteForm($anuncio);

        return $this->render('anuncio/show.html.twig', array(
            'anuncio' => $anuncio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing anuncio entity.
     *
     */
    public function editAction(Request $request, Anuncio $anuncio)
    {
        $deleteForm = $this->createDeleteForm($anuncio);
        $editForm = $this->createForm('AppBundle\Form\AnuncioType', $anuncio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('anuncio_edit', array('id' => $anuncio->getId()));
        }

        return $this->render('anuncio/edit.html.twig', array(
            'anuncio' => $anuncio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    public function listAllByTipoanuncioAction() {
    
        $tipoanuncios= $this->getDoctrine()->getRepository('AppBundle:Tipoanuncio')->findAll();
    
        return $this->render('anuncio/listByTipoanuncio.html.twig', array('tipoanuncios'=>$tipoanuncios));
    
    }


    /**
     * Deletes a anuncio entity.
     *
     */
    public function deleteAction(Request $request, Anuncio $anuncio)
    {
        $form = $this->createDeleteForm($anuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($anuncio);
            $em->flush($anuncio);
        }

        return $this->redirectToRoute('anuncio_index');
    }

    /**
     * Creates a form to delete a anuncio entity.
     *
     * @param Anuncio $anuncio The anuncio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Anuncio $anuncio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('anuncio_delete', array('id' => $anuncio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
