<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/09/17
 * Time: 16:59
 */

namespace Miky\Bundle\MailBundle\Model;


abstract class BasePredefinedMailSchemaGroup
{
    /**
     * @return array
     */
    abstract public static function getContexts();

    protected function createSchema(){
        return new PredefinedMailSchema();
    }

}