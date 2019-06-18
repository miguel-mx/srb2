<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Author controller.
 *
 * @Route("author")
 */
class AuthorController extends Controller
{
    /**
     * Lists all author entities.
     *
     * @Route("/", name="author_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $authors = $em->getRepository('AppBundle:Author')->findAll();

        return $this->render('author/index.html.twig', array(
            'authors' => $authors,
        ));
    }

    public function dataTableAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $authors = $em->getRepository(Author::class)->findAll();

        return $this->render('author/index.html.twig', array(
            'authors' => $authors,
        ));

    }

    /**
     * Creates a new author entity.
     *
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("ROLE_ADMIN", message="Access denied!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Post not found")
     *
     * @Route("/new", name="author_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $author = new Author();
        $form = $this->createForm('AppBundle\Form\AuthorType', $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            $this->addFlash(
                'success',
                'Author agregado con éxito!'
            );

            return $this->redirectToRoute('author_show', array('slug' => $author->getSlug()));
        }

        return $this->render('author/new.html.twig', array(
            'author' => $author,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a author entity.
     *
     * @Route("/{slug}", name="author_show")
     * @Method("GET")
     */
    public function showAction(Author $author)
    {
        $deleteForm = $this->createDeleteForm($author);

        return $this->render('author/show.html.twig', array(
            'author' => $author,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing author entity.
     *
     * Will throw a normal AccessDeniedException:
     *
     * @IsGranted("ROLE_ADMIN", message="Access denied!")
     *
     * Will throw an HttpException with a 404 status code:
     *
     * @IsGranted("ROLE_ADMIN", statusCode=404, message="Post not found")
     *
     * @Route("/{id}/edit", name="author_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Author $author)
    {
        $deleteForm = $this->createDeleteForm($author);
        $editForm = $this->createForm('AppBundle\Form\AuthorType', $author);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('author_show', array('slug' => $author->getSlug()));
        }

        return $this->render('author/edit.html.twig', array(
            'author' => $author,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a author entity.
     *
     * @Route("/{id}", name="author_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Author $author)
    {
        $form = $this->createDeleteForm($author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($author);
            $em->flush();
        }

        return $this->redirectToRoute('author_index');
    }

    /**
     * Creates a form to delete a author entity.
     *
     * @param Author $author The author entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Author $author)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('author_delete', array('id' => $author->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
