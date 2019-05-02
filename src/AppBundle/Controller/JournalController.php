<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Journal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Journal controller.
 *
 * @Route("journal")
 */
class JournalController extends Controller
{
    /**
     * Lists all journal entities.
     *
     * @Route("/", name="journal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $journals = $em->getRepository('AppBundle:Journal')->findAll();

        return $this->render('journal/index.html.twig', array(
            'journals' => $journals,
        ));
    }

    /**
     * Creates a new journal entity.
     *
     * @Route("/new", name="journal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $journal = new Journal();
        $form = $this->createForm('AppBundle\Form\JournalType', $journal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($journal);
            $em->flush();

            return $this->redirectToRoute('journal_show', array('id' => $journal->getId()));
        }

        return $this->render('journal/new.html.twig', array(
            'journal' => $journal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a journal entity.
     *
     * @Route("/{id}", name="journal_show")
     * @Method("GET")
     */
    public function showAction(Journal $journal)
    {
        $deleteForm = $this->createDeleteForm($journal);

        return $this->render('journal/show.html.twig', array(
            'journal' => $journal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing journal entity.
     *
     * @Route("/{id}/edit", name="journal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Journal $journal)
    {
        $deleteForm = $this->createDeleteForm($journal);
        $editForm = $this->createForm('AppBundle\Form\JournalType', $journal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('journal_edit', array('id' => $journal->getId()));
        }

        return $this->render('journal/edit.html.twig', array(
            'journal' => $journal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a journal entity.
     *
     * @Route("/{id}", name="journal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Journal $journal)
    {
        $form = $this->createDeleteForm($journal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($journal);
            $em->flush();
        }

        return $this->redirectToRoute('journal_index');
    }

    /**
     * Creates a form to delete a journal entity.
     *
     * @param Journal $journal The journal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Journal $journal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('journal_delete', array('id' => $journal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
