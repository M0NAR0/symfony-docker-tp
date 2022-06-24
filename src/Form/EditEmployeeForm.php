<?php


namespace App\Form;


use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class EditEmployeeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('employeeFirstname', null, [
                'label' => 'Prénom',
                'required' => false
            ])
            ->add('employeeLastname', null, [
                'label' => 'Nom',
                'required' => false
            ])
            ->add('employeeAddress', null, [
                'label' => 'Adresse',
                'required' => false,
                'help' => 'n° de rue, nom de la rue.'
            ])
            ->add('employeeCity', null, [
                'label' => 'Ville',
                'required' => false
            ])
            ->add('employeePostalCode', TextType::class, [
                'label' => 'Code Postal',
                'required' => false,
                'constraints' => [
                    new Regex('/^[0-9\-]{5}+$/')
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}