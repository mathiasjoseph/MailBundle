<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 30/11/16
 * Time: 21:24
 */

namespace Miky\Bundle\MailBundle\EventListener;


use Miky\Bundle\AdminBundle\Menu\MainMenuBuilder;
use Miky\Bundle\CoreBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailMenuSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return array(
            MainMenuBuilder::EVENT_NAME => 'onAdminMenu',
        );
    }

    public function onAdminMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $projectSubMenu = $menu
            ->addChild('mail')
            ->setLabel('miky.ui.mail')
            ->setLabelAttribute('icon', 'envelope-o')
        ;
        $projectSubMenu
            ->addChild('mail_list')//, ['route' => 'miky_admin_project_index'])
            ->setLabel('miky.ui.mails_type_list')
            ->setLabelAttribute('icon', 'diamond')
        ;
    }
}