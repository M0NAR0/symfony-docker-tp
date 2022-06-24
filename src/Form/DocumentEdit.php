<?php


namespace App\Form;


use App\Entity\DocumentEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('acceptation_client', null, ['label' => 'Acceptation Client'])
            ->add('date_intervention', null, ['label' => 'Date intervention'])
            ->add('equipe', null, ['label' => 'Equipe'])
            ->add('plan', null, ['label' => 'Plans'])
            ->add('hauteur_travail', null, ['label' => 'Hauteur de travail'])
            ->add('besoin_interimaire', null, ['label' => 'Besoin intérimaire'])
            ->add('livraison_materiaux_site', null, ['label' => 'Livraison matériaux sur site'])
            ->add('copie_bon_commande', null, ['label' => 'Copie bon de commande'])
            ->add('besoin_echafaudage', null, ['label' => 'Besoin échafaudage'])
            ->add('hauteur_echafaudage', null, ['label' => 'Hauteur échafaudage'])
            ->add('aire_stockage_materiaux', null, ['label' => 'Aire de stockage pour matériaux'])
            ->add('date_chantier_fini', null, ['label' => 'Chantier fini le'])
            ->add('chantier_fini', null, ['label' => 'Chantier fini'])
            ->add('observations_compagnons', null, ['label' => 'Observations des compagnons'])
            ->add('observations', null, ['label' => 'Observations'])
            ->add('acceptation_client', null, ['label' => 'Acceptation Client'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentEntity::class,
        ]);
    }
}