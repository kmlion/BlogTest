<?php

namespace Blog\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogUserBundle:Default:index.html.twig');
    }
    
    public function loginAction()
    {
        return $this->render('BlogUserBundle:Default:login.html.twig');
    }
    
    public function registerAction()
    {
        return $this->render('BlogUserBundle:Default:register.html.twig');
    }
}
