<?php

namespace Miky\Bundle\MailBundle\Doctrine\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * PredefinedMailTranslation
 */
class PredefinedMailTranslation extends \Miky\Bundle\MailBundle\Model\PredefinedMailTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var int
     */
    protected $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

