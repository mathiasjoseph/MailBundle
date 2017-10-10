<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 09/08/16
 * Time: 09:40
 */

namespace Miky\Bundle\MailBundle\Form\Type\Admin;


use Miky\Bundle\LocaleBundle\Form\Type\TranslatableType;
use Miky\Bundle\MailBundle\Model\PredefinedMailSchema;
use Miky\Bundle\MailBundle\Model\PredefinedSchemaManager;
use Miky\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PredefinedMailAdminType extends AbstractResourceType
{
    /**
     * @var PredefinedSchemaManager
     */
    private $predefinedSchemaManager;

    /**
     * PredefinedMailAdminType constructor.
     */
    public function __construct($dataClass, PredefinedSchemaManager $predefinedSchemaManager)
    {
        parent::__construct($dataClass);
        $this->predefinedSchemaManager = $predefinedSchemaManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('context', ChoiceType::class, array(
                "choices" => $this->predefinedSchemaManager->getSchemas(),
                'choice_label' => function($predefinedMailSchema, $key, $index) {
                    /** @var PredefinedMailSchema $predefinedMailSchema */
                    return $predefinedMailSchema->getLabel();
                },
                "casper_group" => "context",
                "casper_name" => "context",
//                "casper_hide" => array(
//                    UserPersonInterface::TYPE_USER => array(UserPersonInterface::TYPE_EMPLOYEE, CommercialPersonInterface::TYPE_CONTACT_SHEET),
//                    UserPersonInterface::TYPE_EMPLOYEE => array(UserPersonInterface::TYPE_USER, CommercialPersonInterface::TYPE_CONTACT_SHEET),
//                    CommercialPersonInterface::TYPE_CONTACT_SHEET => array(UserPersonInterface::TYPE_EMPLOYEE, UserPersonInterface::TYPE_USER)
//                ),
                "casper_show" => function(){
                    $array = array();
                    foreach ($this->predefinedSchemaManager->getSchemas() as $key => $value){
                        $array[$key . "_variables"] = array($key . "_variables");
                    }
                    return $array;
                },
                "label" => "miky_mail.context",
                "simple_select" => false
            ))
            ->add('subject', TranslatableType::class, array(
                "type" => TextType::class,
                "label" => "miky_mail.subject",
                "required_type" => TranslatableType::ALL_REQUIRED,
                "options" => array("attr"=> array("placeholder" => "miky_mail.subject"))
            ))
            ->add('body', TranslatableType::class, array(
                "type" => TextareaType::class,
                "label" => "miky_mail.body",
                "required_type" => TranslatableType::ALL_REQUIRED,
                "options" => array("attr"=> array("placeholder" => "miky_mail.body"))
            ));
        /**
         * @var  $key
         * @var PredefinedMailSchema $value
         */
        foreach ($this->predefinedSchemaManager->getSchemas() as $key => $value){
            $builder->add($key . "_variables", TextType::class, array(
                "mapped" => false,
                'label' => "variables",
                "disabled" => true,
                "casper_group" => "context",
                "casper_name" => $key . "_variables",
            ));
        }
    }
}