<?php

namespace Miky\Bundle\MailBundle\Doctrine\Entity;

use Knp\DoctrineBehaviors\Model as ORMBehaviors;
/**
 * PredefinedMail
 */
class PredefinedMail extends \Miky\Bundle\MailBundle\Model\PredefinedMail
{
    use ORMBehaviors\Translatable\Translatable;

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

