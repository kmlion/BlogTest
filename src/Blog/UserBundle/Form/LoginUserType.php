<?php
    
    namespace Blog\UserBundle\Form;
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
    
    class LoginUserType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            
            $builder

                ->remove('email')
                ->remove('sign_in')
                ->add('log_in', SubmitType::class);
 
        }
        
        public function getParent()
        {
            return UserType::class;
        }
    }
 