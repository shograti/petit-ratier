<?php

namespace App\Form;

use App\Entity\Offer;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameOffer')
            ->add('pictureOffer')
            ->add('descriptionOffer',TextareaType::class,['attr' => ['rows' => 15,]])
            ->add('quantityOffer')
            ->add('startOffer')
            ->add('endOffer')
            //->add('isvalideOffer')
            ->add('initialPrice')
            ->add('soldedPrice')
            //->add('postDate')
            //->add('slugOffer')
            //->add('osm')
            //->add('idUser')
            ->add('idType', EntityType::class,['class'=>Category::class, 'choice_label'=>'type'])
            ->add('save', SubmitType::class, ['label' => 'Create Offer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
