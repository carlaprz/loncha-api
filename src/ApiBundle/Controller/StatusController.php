<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class StatusController extends Controller
{
    /**
     * @Route("/status", methods="GET")
     */
    public function indexAction()
    {
        return $this->json(['status' => 'ok'], 200);
    }
}
