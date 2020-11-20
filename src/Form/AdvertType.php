<?php

use App\Entity\City;
use App\Entity\Categories;
use App\Entity\SubCategories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdvertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', EntityType::class, [
                'label' => 'ville',
                'class' => City::class,
                'choice_label' => 'name',
            ])
            ->add('subCategory', EntityType::class, [
                'label' => 'souscategories',
                'class' => SubCategories::class,
                'choice_label' => 'name',
            ])
            ->add('save', SubmitType::class, [ 'label' => 'envoyer' ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'city' => null,
            'category' => null,
        ]);
    }
}


