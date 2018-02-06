<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UsersController extends FOSRestController
{
    /**
     * @Route("/users/{id}", defaults={"id" = 1})
     * @Method({"GET"})
     */
    public function indexAction($id)
    {
        $data = array('Usuarios' => array(
            array(
                'nombre'   => 'Víctor',
                'Apellido' => 'Robles'
            ),
            array(
                'nombre'   => 'Antonio',
                'Apellido' => 'Martinez'
            )));

        return $data;
    }
}
