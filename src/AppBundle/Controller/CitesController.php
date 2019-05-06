<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cites;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cite controller.
 *
 * @Route("cites")
 */
class CitesController extends Controller
{
    /**
     * Lists all cite entities.
     *
     * @Route("/", name="cites_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cites = $em->getRepository('AppBundle:Cites')->findAll();

        return $this->render('cites/index.html.twig', array(
            'cites' => $cites,
        ));
    }

    /**
     * Creates a new cite entity.
     *
     * @Route("/new", name="cites_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cite = new Cites();
        $form = $this->createForm('AppBundle\Form\CitesType', $cite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cite);
            $em->flush();

            return $this->redirectToRoute('cites_show', array('id' => $cite->getId()));
        }

        return $this->render('cites/new.html.twig', array(
            'cite' => $cite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cite entity.
     *
     * @Route("/{id}", name="cites_show")
     * @Method("GET")
     */
    public function showAction(Cites $cite)
    {
        $deleteForm = $this->createDeleteForm($cite);

        return $this->render('cites/show.html.twig', array(
            'cite' => $cite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cite entity.
     *
     * @Route("/{id}/edit", name="cites_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cites $cite)
    {
        $deleteForm = $this->createDeleteForm($cite);
        $editForm = $this->createForm('AppBundle\Form\CitesType', $cite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cites_edit', array('id' => $cite->getId()));
        }

        return $this->render('cites/edit.html.twig', array(
            'cite' => $cite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cite entity.
     *
     * @Route("/{id}", name="cites_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cites $cite)
    {
        $form = $this->createDeleteForm($cite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cite);
            $em->flush();
        }

        return $this->redirectToRoute('cites_index');
    }

    /**
     * Creates a form to delete a cite entity.
     *
     * @param Cites $cite The cite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cites $cite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cites_delete', array('id' => $cite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
