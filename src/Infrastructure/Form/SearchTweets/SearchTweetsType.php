<?php


namespace App\Infrastructure\Form\SearchTweets;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class SearchTweetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
                'label' => false,
                'attr' => [
                    'placeholder' => 'Enter a username...',
                    'class' => 'form-control mt-2'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Search!',
                'attr' => [
                    'class' => 'form-control mt-2 btn btn-success'
                ]
            ]);
    }
}