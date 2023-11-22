<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('name', TextType::class)
            ->add('age', IntegerType::class)
            ->add('sex', ChoiceType::class, [
                'choices'  => [
                    'male' => 'male',
                    'female' => 'female'
                ],
            ])
            ->add('birthday', BirthdayType::class, [
                'widget' => 'single_text',
                'input' => 'datetime'
            ])
            ->add('phone', TelType::class)
            ->add('created_at', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text'
            ])
            ->add('updated_at', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
