<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Fi;
use AppBundle\Entity\Journal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Fi controller.
 *
 * @Route("fi")
 */
class FiController extends Controller
{
    /**
     * Lists all fi entities.
     *
     * @Route("/", name="fi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fis = $em->getRepository('AppBundle:Fi')->findAll();

        return $this->render('fi/index.html.twig', array(
            'fis' => $fis,
        ));
    }

    /**
     * Creates a new fi entity.
     *
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("ROLE_ADMIN", message="No access! Get out!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Post not found")
     *
     * @Route("/new/{id}", name="fi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Journal $journal)
    {
        $fi = new Fi();
        $fi->setJournal($journal);
        $form = $this->createForm('AppBundle\Form\FiType', $fi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fi);
            $em->flush();

            return $this->redirectToRoute('fi_show', array('id' => $fi->getId()));
        }

        return $this->render('fi/new.html.twig', array(
            'fi' => $fi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fi entity.
     *
     * @Route("/{id}", name="fi_show")
     * @Method("GET")
     */
    public function showAction(Fi $fi)
    {
        $deleteForm = $this->createDeleteForm($fi);

        return $this->render('fi/show.html.twig', array(
            'fi' => $fi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fi entity.
     *
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("ROLE_ADMIN", message="No access! Get out!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Post not found")
     *
     * @Route("/{id}/edit", name="fi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Fi $fi)
    {
        $deleteForm = $this->createDeleteForm($fi);
        $editForm = $this->createForm('AppBundle\Form\FiType', $fi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fi_edit', array('id' => $fi->getId()));
        }

        return $this->render('fi/edit.html.twig', array(
            'fi' => $fi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fi entity.
     *
     * @Route("/{id}", name="fi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Fi $fi)
    {
        $form = $this->createDeleteForm($fi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fi);
            $em->flush();
        }

        return $this->redirectToRoute('fi_index');
    }

    /**
     * Creates a form to delete a fi entity.
     *
     * @param Fi $fi The fi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fi $fi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fi_delete', array('id' => $fi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
