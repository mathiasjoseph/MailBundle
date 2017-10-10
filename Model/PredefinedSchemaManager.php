<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/10/17
 * Time: 04:22
 */

namespace Miky\Bundle\MailBundle\Model;


use Miky\Component\Registry\ServiceRegistry;

class PredefinedSchemaManager
{
    /**
     * @var ServiceRegistry
     */
    private $groupRegistry;

    /**
     * @var PredefinedMailSchema[]
     */
    private $schemas;

    /**
     * PredefinedSchemaManager constructor.
     * @param ServiceRegistry $groupRegistry
     */
    public function __construct(ServiceRegistry $groupRegistry)
    {
        $this->groupRegistry = $groupRegistry;
        $this->loadSchemas();
    }

    private function loadSchemas(){
        /**
         * @var  $key
         * @var BasePredefinedMailSchemaGroup $group
         */
        foreach ($this->groupRegistry->all() as $key => $group){
            $className = get_class($group);
            $contextArray = $className::getContexts();
            foreach ($contextArray as $key1 => $method){
                if ($group->$method() instanceof PredefinedMailSchema){
                    $this->schemas[$key1] = $group->$method();
                }
            }
        }
    }

    /**
     * @return PredefinedMailSchema[]
     */
    public function getSchemas()
    {
        return $this->schemas;
    }

    /**
     * @param PredefinedMailSchema[] $schemas
     */
    public function setSchemas($schemas)
    {
        $this->schemas = $schemas;
    }



}