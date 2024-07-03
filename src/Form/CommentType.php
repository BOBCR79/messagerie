<?php

namespace App\Form;

use App\Entity\Comments;
use App\Entity\Posts;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class ,[
                'required'=> true,
                'label'=> 'Message :',
                'attr' =>['class'=>'flex flex-col gap-2 w-96']
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class'=> 'bg-green-800 text-white font-bold p-2 rounded-lg mt-2']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}