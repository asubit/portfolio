<?php

namespace Asubit\Bundle\PortfolioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	/**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:index.html.twig');
    }
}
