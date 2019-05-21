<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

        $searchQuery  = $request->get('query');

        if(!empty($searchQuery)){
            $finder  = $this->container->get('fos_elastica.finder.app.referencia');
            $referencias = $finder->createPaginatorAdapter($searchQuery);
        }else{
            $em = $this->getDoctrine()->getManager();
            $referencias = $em->getRepository(Referencia::class)->findByYearpub('2018');

        }


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
          $referencias, $request->query->getInt('page',1),
            10
        );


        return $this->render('referencia/index.html.twig', array(
            'pagination' => $pagination,
        ));


    }

    /**
     * Lists all referencium entities.
     *
     * @Route("/data-tables", name="referencia_index2")
     * @Method("GET")
     */
    public function dataTableAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $referencias = $em->getRepository(Referencia::class)->findByYearpub('2018');

        return $this->render('referencia/data-tables.html.twig', array(
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
        $referencia = new Referencia();



        $form = $this->createForm('AppBundle\Form\ReferenciaType', $referencia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $referencia->getTitle()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($referencia);
            $em->flush();

            return $this->redirectToRoute('referencia_show', array('id' => $referencia->getId()));
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
     * Displays a form to edit an existing referencium entity.
     *
     * @Route("/{slug}/edit", name="referencia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Referencia $referencia)
    {
        $deleteForm = $this->createDeleteForm($referencia);
        $editForm = $this->createForm('AppBundle\Form\ReferenciaType', $referencia);
        $editForm->handleRequest($request);


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
            ->getForm()
        ;
    }
}
