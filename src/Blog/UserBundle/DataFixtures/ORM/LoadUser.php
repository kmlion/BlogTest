<?php
    
    namespace Blog\UserBundle\DataFixtures\ORM;
    
    use Blog\UserBundle\Entity\User;
    use Doctrine\Common\DataFixtures\FixtureInterface;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\DependencyInjection\ContainerAwareInterface;
    use Symfony\Component\DependencyInjection\ContainerInterface;
    
    class LoadUser implements FixtureInterface, ContainerAwareInterface
    {
        private $container;
    
        public function setContainer(ContainerInterface $container = null)
        {
            $this->container = $container;
        }
        public function load(ObjectManager $manager)
        {
            $listNames = array('admin', 'Marine', 'Anna', 'Julie');
            
            foreach ($listNames as $name) {
                $user = new User;
                $user->setUsername($name);
                $user->setSalt(md5(uniqid()));
                $encoder = $this->container->get('security.password_encoder');
                $password = $encoder->encodePassword($user, $name);
                $user->setPassword($password);
                $user->setEmail($name.'@blog.com');
                if ($name == 'admin') {
                    $user->setRoles(array('ROLE_ADMIN'));
                }else{
                    $user->setRoles(array('ROLE_USER'));
                }
                
                $manager->persist($user);
            }
            $manager->flush();
        }
    }