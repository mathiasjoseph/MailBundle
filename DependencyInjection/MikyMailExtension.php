<?php

namespace Miky\Bundle\MailBundle\DependencyInjection;

use Miky\Bundle\CoreBundle\DependencyInjection\AbstractCoreExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MikyMailExtension extends AbstractCoreExtension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        $configuration = new Configuration($container->getParameter("miky_mail.use_default_entities"));
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        if (isset($bundles['MikyAdminBundle'])) {
            $loader->load('services/admin.xml');
        }

        $this->remapParametersNamespaces($config, $container, array(
            '' => array(
                'predefined_mail_class' => 'miky_mail.model.predefined_mail.class',
                'predefined_mail_translation_class' => 'miky_mail.model.predefined_mail_translation.class',
            ),
        ));
    }

    public function prepend(ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config/app'));
        $loader->load('config.yml');
    }
}
