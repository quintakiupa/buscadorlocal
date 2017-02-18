<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Buscar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Buscar controller.
 *
 */
class BuscarController extends Controller
{
    /**
     * Lists all buscar entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $buscars = $em->getRepository('AppBundle:Buscar')->findAll();

        return $this->render('buscar/index.html.twig', array(
            'buscars' => $buscars,
        ));
    }

    /**
     * Creates a new buscar entity.
     *
     */
    public function newAction(Request $request)
    {
        $buscar = new Buscar();        

        $form = $this->createForm('AppBundle\Form\BuscarType', $buscar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // Las siguientes dos líneas meten la fecha de ese momento en la base de datos automaticamente
            $hoy = date("d-m-Y");            
            $buscar->setFecha($hoy);
            // La siguiente línea mete de forma automática el "tipocomercio_id" para hacer estadísticas luego.
            $buscar->setTipocomercio($buscar->getCriterio());

            $em->persist($buscar);
            $em->flush($buscar);

            //return $this->redirectToRoute('buscar_show', array('id' => $buscar->getId()));
            return $this->redirectToRoute('comercio_listByNomCom', array('nombre' => $buscar->getCriterio()));

        }

        return $this->render('buscar/new.html.twig', array(
            'buscar' => $buscar,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a buscar entity.
     *
     */
    public function showAction(Buscar $buscar)
    {
        $deleteForm = $this->createDeleteForm($buscar);

        return $this->render('buscar/show.html.twig', array(
            'buscar' => $buscar,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing buscar entity.
     *
     */
    public function editAction(Request $request, Buscar $buscar)
    {
        $deleteForm = $this->createDeleteForm($buscar);
        $editForm = $this->createForm('AppBundle\Form\BuscarType', $buscar);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('buscar_edit', array('id' => $buscar->getId()));
        }

        return $this->render('buscar/edit.html.twig', array(
            'buscar' => $buscar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a buscar entity.
     *
     */
    public function deleteAction(Request $request, Buscar $buscar)
    {
        $form = $this->createDeleteForm($buscar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($buscar);
            $em->flush($buscar);
        }

        return $this->redirectToRoute('buscar_index');
    }

    /**
     * Creates a form to delete a buscar entity.
     *
     * @param Buscar $buscar The buscar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Buscar $buscar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('buscar_delete', array('id' => $buscar->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function infoServicioAction() {

        return $this->render('default/info.html.twig');    
    }

    public function contactoAction() {

        return $this->render('default/contacto.html.twig');    
    }

    public function estadisticasAction() {
        $tipocomercios = $this->getDoctrine()->getRepository('AppBundle:Tipocomercio' )->findAll();
        
        return $this->render ('buscar/estadisticas.html.twig', array('tipocomercios'=>$tipocomercios));
        
    }


}
