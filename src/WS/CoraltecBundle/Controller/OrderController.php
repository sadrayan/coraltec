<?php

namespace WS\CoraltecBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderController extends Controller
{
    public function indexAction()
    {
        // load product page.
        return $this->render('WSCoraltecBundle:Orcer:index.html.twig');
    }


}
