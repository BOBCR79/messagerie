<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use symfony\component\validator\Constraints\Image;
use Symfony\Contracts\Translation\TranslatorInterface;


class PostType extends AbstractType
{
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class,[
                'label' => $this->translator->trans("new_post"),
                'attr' =>['class'=>'flex flex-col gap-4 w-96']
            ])
            ->add('image', FileType::class, [
                'required' => false,
                'mapped' => false,
//                'constraints' => new Image( maxSize: '2048k')
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class'=> 'bg-green-800 text-white font-bold p-2 rounded-lg mt-2']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
