<?php

namespace AppBundle\Form;

use AppBundle\Entity\Transport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransportFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'to other transport' => 'to other transport',
                    'to hotel' => 'to hotel',
                    'to attraction' => 'to attraction',
                    'other' => 'other'
                ]
            ])
            ->add('description')
            ->add('meansOfTransport', ChoiceType::class, [
                'choices' => [
                    'plane' => 'plane',
                    'train' => 'train',
                    'boat' => 'boat',
                    'taxi' => 'taxi'

                ]
            ])
            ->add('startsAt', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'departs at'
            ])
            ->add('endsAt', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'arrival at'
            ])
            ->add('costs')
            ->add('paymentStatus')
            ->add('document1', FileType::class)
            ->add('document2', FileType::class)
            ->add('document3', FileType::class)
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transport::class
        ]);
    }
}
