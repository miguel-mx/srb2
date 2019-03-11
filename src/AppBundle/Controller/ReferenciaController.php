<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Referencium controller.
 *
 * @Route("referencia")
 */
class ReferenciaController extends Controller
{
    /**
     * Lists all referencium entities.
     *
     * @Route("/", name="referencia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

//        $referencias = $em->getRepository('AppBundle:Referencia')->findByYearPub('2018');
//        $referencias = $em->getRepository('AppBundle:Referencia')->findByYearOrderByYear('2018');
        $referencias = $em->getRepository(Referencia::class)->findByYearpub('2018');

        return $this->render('referencia/index.html.twig', array(
            'referencias' => $referencias,
        ));
    }

    /**
     * Creates a new referencium entity.
     *
     * @Route("/new", name="referencia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $referencium = new Referencium();
        $form = $this->createForm('AppBundle\Form\ReferenciaType', $referencium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($referencium);
            $em->flush();

            return $this->redirectToRoute('referencia_show', array('id' => $referencium->getId()));
        }

        return $this->render('referencia/new.html.twig', array(
            'referencium' => $referencium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a referencium entity.
     *
     * @Route("/{id}", name="referencia_show")
     * @Method("GET")
     */
    public function showAction(Referencia $referencium)
    {
        $deleteForm = $this->createDeleteForm($referencium);

        return $this->render('referencia/show.html.twig', array(
            'referencium' => $referencium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing referencium entity.
     *
     * @Route("/{id}/edit", name="referencia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Referencia $referencium)
    {
        $deleteForm = $this->createDeleteForm($referencium);
        $editForm = $this->createForm('AppBundle\Form\ReferenciaType', $referencium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('referencia_edit', array('id' => $referencium->getId()));
        }

        return $this->render('referencia/edit.html.twig', array(
            'referencium' => $referencium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a referencium entity.
     *
     * @Route("/{id}", name="referencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Referencia $referencium)
    {
        $form = $this->createDeleteForm($referencium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($referencium);
            $em->flush();
        }

        return $this->redirectToRoute('referencia_index');
    }

    /**
     * Creates a form to delete a referencium entity.
     *
     * @param Referencia $referencium The referencium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Referencia $referencium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('referencia_delete', array('id' => $referencium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
