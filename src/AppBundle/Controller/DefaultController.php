<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $response = $this->redirectToRoute('index_home');

// marcar la response como public o private
        $response->setPublic();
        $response->setPrivate();

// establecer la max age private o shared
        $response->setMaxAge(3600);
        $response->setSharedMaxAge(3600);

// establecer una directiva Cache-Control personalizada
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;

    }

    /**
     * @Route("/index.{_format}", name="index_home", defaults={"_format"="html"}, requirements={"_format"="html|xml"}))
     */

    public function index(Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository(Referencia::class);

        $qb = $repository->createQueryBuilder('r')
            ->andWhere('r.type  LIKE :article')
            ->setParameter('article', "article")
            ->setMaxResults(5)
            ->orderBy('r.id', 'DESC')
            ->getQuery();
        $referencias = $qb->getResult();

        $qbArticles = $repository->createQueryBuilder('a')
            ->select('a.id')
            ->andWhere('a.type  LIKE :article')
            ->setParameter('article', "article")
            ->getQuery();
        $articlesTotal = $qbArticles->getResult();


        $qbThesis = $repository->createQueryBuilder('t')
            ->select('t.id')
            ->andWhere('t.type  LIKE :thesis')
            ->setParameter('thesis', "thesis")
            ->getQuery();
        $thesisTotal = $qbThesis->getResult();

        $qbrevision = $repository->createQueryBuilder('r')
            ->select('r.id')
            ->andWhere('r.revision  = :revision')
            ->setParameter('revision', 0)
            ->getQuery();
        $revision = $qbrevision->getResult();

        $repositoryAuthor = $this->getDoctrine()
            ->getRepository(Author::class);

        $qbAuthor = $repositoryAuthor->createQueryBuilder('a')
            ->select('a.id')
            ->getQuery();
        $authorTotal = $qbAuthor->getResult();

        $searchQuery = $request->get('q');

        if (!empty($searchQuery)) {
            $finder = $this->container->get('fos_elastica.finder.app.referencia');
            $result = $finder->find($searchQuery, 500);

            if ($result == null) {

                $this->addFlash(
                    'danger',
                    'No se encontraron registros!'
                );

                $format = $request->getRequestFormat();

                return $this->render('main.' . $format . '.twig', [
                    'referencias' => $referencias,
                    'articlesTotal' => $articlesTotal,
                    'thesisTotal' => $thesisTotal,
                    'authorTotal' => $authorTotal,
                    'revision'=> $revision,

                ]);
            } else {
                return $this->render('referencia/index.html.twig', array(
                    'referencias' => $result,
                    'revision'=> $revision,
                ));
            }
        }

        $format = $request->getRequestFormat();

        return $this->render('main.' . $format . '.twig', [
            'referencias' => $referencias,
            'articlesTotal' => $articlesTotal,
            'thesisTotal' => $thesisTotal,
            'authorTotal' => $authorTotal,
            'revision'=> $revision,
        ]);

    }


    /**
     * @Route("/busqueda_avanzada")
     */
    public function busqueda(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('busquedaAvanzada.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    public function logout(Request $request)
    {
        return $this->redirectToRoute('/login');
    }

}