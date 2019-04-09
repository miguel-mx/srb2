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

}
