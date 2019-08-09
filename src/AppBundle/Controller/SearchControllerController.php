<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Referencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Omines\DataTablesBundle\Adapter\Elasticsearch\ElasticaAdapter;

class SearchControllerController extends Controller
{
//    /**
//     * Lists all Referencia entities.
//     *
//     * @Route("/search", name="search")
//     * @Method({ "head", "get" })
//     */
//    public function searchAction(Request $request)
//    {
//        $searchQuery  = $request->get('q');
//
//        if(!empty($searchQuery))
//            $finder  = $this->container->get('fos_elastica.finder.app.referencia');
//        $referencias = $finder->find($searchQuery, 500);
//
//
//        return $this->render('referencia/index.html.twig', array(
//            'referencias' => $referencias,
//        ));
//    }


    /**
     * Lists all referencium entities.
     *
     * @Route("/search2", name="search")
     * @Method("GET")
     */
    public function search(Request $request)
    {
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
                return $this->render('referencia/index.html.twig', array(
                    'referencias' => $referencias,
                ));
            }
        }else{
            return $this->render('main.html.twig');
        }
    }



    /**
     * Lists all referencium entities.
     *
     * @Route("/searchAv", name="referencia_index2")
     * @Method("GET")
     */
    public function searchAV(Request $request)
    {
        $searchTerms = $request->query->all();

        $repository = $this->getDoctrine()
            ->getRepository(Referencia::class);

        $queryBuilder = $repository->createQueryBuilder('r');

        foreach ($searchTerms as $key => $term) {

            $queryBuilder
                ->andWhere('r.' .$key.'  LIKE :r_'.$key)
                ->setParameter('r_'. $key, '%'.strtolower($term).'%');
        }

        $query = $queryBuilder->orderBy('r.yearpub', 'ASC')
            ->getQuery();

        $referencias = $query->getResult();

        if($referencias == null){
            $this->addFlash(
                'error',
                'No se encontraron registros!'
            );
            return $this->render('busquedaAvanzada.html.twig');

        }else{
            return $this->render('referencia/index.html.twig', array(
                'referencias' => $referencias,
            ));
        }
    }

    /**
     * @Route("/revision")
     */
    public function revision(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->createQuery(
            'SELECT p
            FROM AppBundle:Referencia p
            WHERE p.revision = :revision
            ORDER BY p.title ASC'
        )->setParameter('revision', 0);

        $referencias = $query->getResult();

        if($referencias == null){

            $this->addFlash(
                'error',
                'No se encontraron registros!'
            );
            return $this->render('main.html.twig');
        }else{
            return $this->render('referencia/index.html.twig', array(
                'referencias' => $referencias,
            ));
        }
    }
}
