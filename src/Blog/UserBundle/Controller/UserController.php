<?php
    
    namespace Blog\UserBundle\Controller;
    
    use Blog\UserBundle\Entity\User;
    use Blog\UserBundle\Form\LoginUserType;
    use Blog\UserBundle\Form\UserType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;


    class UserController extends Controller
    {
        public function indexAction()
        {
            return $this->render('BlogUserBundle:Default:index.html.twig');
        }
        
        public function registerAction(Request $request)
        {
            $user = new User();
            $form = $this->get('form.factory')->create(UserType::class, $user);
            
            if ($form->handleRequest($request)->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                
                $request->getSession()->getFlashBag()->add('notice', 'Account created.');
                return $this->redirectToRoute('blog_homepage');
            }
            return $this->render('BlogUserBundle:Default:register.html.twig', array(
                'form' => $form->createView()
            ));
        }
        
        public function loginAction(Request $request)
        {
            $form = $this->get('form.factory')->create(LoginUserType::class);
            
            
             if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                return $this->redirectToRoute('blog_homepage');
            }
     
            // Le service authentication_utils permet de récupérer le nom d'utilisateur
            // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
            // (mauvais mot de passe par exemple)
            $authenticationUtils = $this->get('security.authentication_utils');
             return $this->render('BlogUserBundle:Default:login.html.twig', array(
                'last_username' => $authenticationUtils->getLastUsername(),
                'error'         => $authenticationUtils->getLastAuthenticationError(),
                'form' => $form->createView()
            ));
        }
    
   
        public function adminAction()
        {
                    
                  return new Response("Vous êtes bien dans l'espace admin !");
         
        }
    };
