<?php
/**
 * Created by PhpStorm.
 * User: alexu
 * Date: 20.09.2020
 * Time: 10:54
 */

namespace App\Controller\Supplies;

use App\Entity\Products;
use App\Entity\Supplies;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuppliesFormController extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('id_provider',  EntityType::class, array(
                    'class' => 'App:Providers',
                    'choice_label' => 'name',
                    'label' => 'Выбрать поставщика',
                    'multiple' => true,
                )
            )
            ->add('id_product', EntityType::class, array(
                    'class' => 'App:Products',
                    'choice_label' => 'name',
                    'label' => 'Выбрать товар',
                    'multiple' => true
                )
            )

            ->add('save', SubmitType::class, ['label' => 'Добавить']);
    }
}