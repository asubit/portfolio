<?php

namespace Asubit\Bundle\PortfolioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:index.html.twig');
    }

    public function aboutmeAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:aboutme.html.twig');
    }

    public function contactAction()
    {
        return $this->render('AsubitPortfolioBundle:Default:contact.html.twig');
    }
}
