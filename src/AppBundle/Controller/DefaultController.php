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

        return $this->redirectToRoute('referencia_index2');
//        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);
    }

    /**
     * @Route("/index")
     */
    public function index(Request $request)
    {
//        // replace this example code with whatever you need
//        return $this->render('main.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
//        ]);


        $searchQuery  = $request->get('q');

        if(!empty($searchQuery)){
            $finder  = $this->container->get('fos_elastica.finder.app.referencia');
            $referencias = $finder->find($searchQuery, 500);

            if($referencias == null){

                $this->addFlash(
                    'error',
                    'No se encontraron registros!'
                );

                return $this->render('main.html.twig');
            }else{
                return $this->render('referencia/data-tables.html.twig', array(
                    'referencias' => $referencias,
                ));
            }
        }else{

            $repository = $this->getDoctrine()
                ->getRepository(Referencia::class);


            $qb = $repository->createQueryBuilder('r')
                ->andWhere('r.type  LIKE :article')
                ->setParameter('article', "article")
                ->setMaxResults( 5 )
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

            $repositoryAuthor = $this->getDoctrine()
                ->getRepository(Author::class);

            $qbAuthor = $repositoryAuthor->createQueryBuilder('a')
                ->select('a.id')
                ->getQuery();
            $authorTotal = $qbAuthor->getResult();


            return $this->render('main.html.twig', array(
                'referencias' => $referencias,
                'articlesTotal' => $articlesTotal,
                'thesisTotal' => $thesisTotal,
                'authorTotal' => $authorTotal,
            ));
        }
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