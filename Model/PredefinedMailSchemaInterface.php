<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/09/17
 * Time: 16:59
 */

namespace Miky\Bundle\MailBundle\Model;


interface PredefinedMailSchemaInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDefaultBody();

    /**
     * @return string
     */
    public function getDefaultSubject();

    /**
     * @return array
     */
    public function getVariables();

    /**
     * @return string
     */
    public function getDescription();
}