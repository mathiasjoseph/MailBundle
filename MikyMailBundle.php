<?php

namespace Miky\Bundle\MailBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Miky\Bundle\MailBundle\DependencyInjection\Compiler\RegisterSchemasPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MikyMailBundle extends Bundle
{
    private $useDefaultEntities;

    public function __construct($useDefaultEntities = true) {
        $this->useDefaultEntities = $useDefaultEntities;
    }

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->setParameter("miky_mail.use_default_entities", $this->useDefaultEntities);
        $this->addRegisterMappingsPass($container);
        $container->addCompilerPass(new RegisterSchemasPass());
    }

    /**
     * @param ContainerBuilder $container
     */
    private function addRegisterMappingsPass(ContainerBuilder $container)
    {
        $mappings = array(
            realpath(__DIR__.'/Resources/config/doctrine-mapping') => 'Miky\Bundle\MailBundle\Model',
        );
        if (class_exists('Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')) {
            $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver($mappings, array('miky_mail.model_manager_name')));
        }
        if ($this->useDefaultEntities){
            $mappingsBase = array(
                realpath(__DIR__.'/Resources/config/doctrine-base') => 'Miky\Bundle\MailBundle\Doctrine\Entity',
            );
            if (class_exists('Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')) {
                $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver($mappingsBase, array('miky_mail.entity_manager_name')));
            }
        }
    }
}
