<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        $referencias = $em->getRepository(Referencia::class)->findByYearpub('2018');

        return $this->render('referencia/index.html.twig', array(
            'referencias' => $referencias,
        ));

    }/**
 * Displays a form to new an existing reference entity.
 *
 * Will throw a normal AccessDeniedException:
 *
 * @IsGranted("IS_AUTHENTICATED_FULLY", message="Access denied!")
 *
 * Will throw an HttpException with a 404 status code:
 *
 * @IsGranted("IS_AUTHENTICATED_FULLY", statusCode=404, message="Post not found")
 *
 * @Route("/new", name="referencia_new")
 * @Method({"GET", "POST"})
 */
    public function newAction(Request $request)
    {
        $referencia = new Referencia();


        $form = $this->createForm('AppBundle\Form\ReferenciaType', $referencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $referencia->getTitle()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($referencia);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject('Nueva referencia')
                ->setFrom('thaliavelazquez263@gmail.com')
                ->setTo(['sergio.rangel@tecmor.mx', 'thaliavelazquez263@gmail.com'])
                ->setBody($this->renderView('referencia/email_referencia.html.twig', array('referencia' => $referencia)), 'text/html');
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('referencia_show', array('slug' => $referencia->getSlug()));
        }

        return $this->render('referencia/new.html.twig', array(
            'referencia' => $referencia,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a referencium entity.
     *
     * @Route("/{slug}", name="referencia_show")
     * @Method("GET")
     */
    public function showAction(Referencia $referencia)
    {
        $deleteForm = $this->createDeleteForm($referencia);


        return $this->render('referencia/show.html.twig', array(
            'referencia' => $referencia,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reference entity.
     *
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("IS_AUTHENTICATED_FULLY", message="Access denied!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("IS_AUTHENTICATED_FULLY", statusCode=404, message="Post not found")
     *
     * @Route("/{slug}/edit", name="referencia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Referencia $referencia)
    {

        $this->denyAccessUnlessGranted('edit', $referencia);

        $deleteForm = $this->createDeleteForm($referencia);
        $editForm = $this->createForm('AppBundle\Form\ReferenciaType', $referencia);
        $editForm->handleRequest($request);
        $referencia->setModified($referencia);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('referencia_show', array('slug' => $referencia->getSlug()));
        }

        return $this->render('referencia/edit.html.twig', array(
            'referencia' => $referencia,
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
            ->getForm();
    }


}