<?php
    
    namespace Blog\UserBundle\Form;
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    
    class UserType extends AbstractType
    {
        /**
         * {@inheritdoc}
         */
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('username',    TextType::class)
                ->add('password', PasswordType::class)
                ->add('email',    TextType::class)
                ->add('sign_in',      SubmitType::class);
             
        }
        
        /**
         * {@inheritdoc}
         */
        public function configureOptions(OptionsResolver $resolver)
        {
            
            $resolver->setDefaults(array(
                'data_class'        => 'Blog\UserBundle\Entity\User',
                'csrf_protection'   => true,
                'csrf_field_name'   => '_token',
                'csrf_token_id'     => 'task_item',
            ));
        }
        public function getName()
        {
            return 'user';
        }
        
    }
