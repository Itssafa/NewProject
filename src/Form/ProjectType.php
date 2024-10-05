<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomp', TextType::class, [
                'label' => 'Nom du projet'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description du projet',
                'required' => false,
            ])
            ->add('direction', TextType::class, [
                'label' => 'Direction'
            ])
            ->add('budget', MoneyType::class, [
                'label' => 'Budget',
                'currency' => 'EUR', // Changez la devise si nécessaire
            ])
            ->add('periode', IntegerType::class, [
                'label' => 'période (en jours)',
                'help' => 'Indiquez la période du projet en jours.'
            ])
            ->add('chefduprojet', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nom', // ou 'email' ou autre champ que vous souhaitez afficher
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
