<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/09/17
 * Time: 16:59
 */

namespace Miky\Bundle\MailBundle\Model;


class PredefinedMailSchema
{
    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

}