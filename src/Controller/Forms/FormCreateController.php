<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 19.09.2020
 * Time: 23:19
 */

namespace App\Controller\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FormCreateController extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Имя'])
            ->add('save', SubmitType::class, ['label' => 'Добавить'])
            ->getForm();
        ;
    }
}