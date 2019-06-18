<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Journal;
use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("ROLE_ADMIN", message="Access denied!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Post not found")
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

            $this->addFlash(
                'success',
                'Revista agregada con éxito!'
            );

            $message = \Swift_Message::newInstance()
                ->setSubject('Nueva revista')
                ->setFrom('thaliavelazquez263@gmail.com')
                ->setTo(['sergio.rangel@tecmor.mx', 'thaliavelazquez263@gmail.com'])
                ->setBody($this->renderView('journal/email_journal.html.twig', array('journal' => $journal)), 'text/html');
            $this->get('mailer')->send($message);

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
    public function showAction(Journal $journal, Referencia $referencia)
    {
        $deleteForm = $this->createDeleteForm($journal);

        return $this->render('journal/show.html.twig', array(
            'journal' => $journal,
            'referencia' => $referencia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing journal entity.
     *
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("ROLE_ADMIN", message="Access denied!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Post not found")
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

            return $this->redirectToRoute('journal_show', array('id' => $journal->getId()));
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
            ->getForm();
    }
}
