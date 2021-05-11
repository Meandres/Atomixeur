<?php

namespace App\Form;

use App\Entity\Cooperateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class MonProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $roles=$options["data"]->getRoles();
        $qualifications=$options["data"]->getQualifications();
        $inscriptions=$options["data"]->getInscriptions();
        $builder
            ->add('email', EmailType::class)
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('envoiMail', CheckboxType::class, array('label' => 'Voulez-vous recevoir des mails de rappel ? '))
            ;
        foreach($roles as $key => $role){
          $builder->add('Role_'.$key, TextType::class, ["data"=>$role, "mapped"=>false]);
        }
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cooperateur::class,
        ]);
    }
}
