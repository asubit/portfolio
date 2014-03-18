<?php

namespace Asubit\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	/**
     * @Route("/userbundle", name="userbundle")
     */
    public function indexAction()
    {
        return $this->render('AsubitUserBundle:Default:index.html.twig');
    }
}
