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
    /**
     * Lists all Referencia entities.
     *
     * @Route("/search", name="search")
     * @Method({ "head", "get" })
     */
    public function searchAction(Request $request)
    {
        $searchQuery  = $request->get('q');

        if(!empty($searchQuery))
            $finder  = $this->container->get('fos_elastica.finder.app.referencia');
        $referencias = $finder->find($searchQuery, 500);


        return $this->render('referencia/data-tables.html.twig', array(
            'referencias' => $referencias,
        ));
    }
//    /**
//     * Lists all referencium entities.
//     *
//     * @Route("/search2", name="referencia_index2")
//     * @Method("GET")
//     */
//    public function search(Request $request)
//    {
//        $searchQuery  = $request->get('q');
//
//        if(!empty($searchQuery)){
//            $finder  = $this->container->get('fos_elastica.finder.app.referencia');
//            $referencias = $finder->find($searchQuery, 500);
//
//            if($referencias == null){
//
//                $this->addFlash(
//                    'error',
//                    'No se encontraron registros!'
//                );
//
//                return $this->render('main.html.twig');
//            }else{
//                return $this->render('referencia/data-tables.html.twig', array(
//                    'referencias' => $referencias,
//                ));
//            }
//        }else{
//
//            $repository = $this->getDoctrine()
//                ->getRepository(Referencia::class);
//
//
//            $qb = $repository->createQueryBuilder('r')
//                ->setMaxResults( 5 )
//                ->orderBy('r.id', 'DESC')
//                ->getQuery();
//
//            $referencias = $qb->getResult();
//
//
//            return $this->render('main.html.twig', array(
//                'referencias' => $referencias,
//            ));
//        }
//    }
}
