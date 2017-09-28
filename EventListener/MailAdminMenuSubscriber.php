<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 19/05/17
 * Time: 17:15
 */

namespace Miky\Bundle\MailBundle\EventListener;


use Knp\Menu\ItemInterface;
use Miky\Bundle\AdminBundle\Menu\AdminMenuBuilder;
use Miky\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailAdminMenuSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            AdminMenuBuilder::EVENT_NAME => 'onAdminMenu',
        );
    }

    public function onAdminMenu(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();
        $mailSubMenu = $menu
            ->addChild('mail')
            ->setLabel('Mail')
            ->setLabelAttribute('icon', 'star');

        $mailSubMenu
            ->addChild('predefined_mail', ['route' => 'miky_mail_admin_predefined_mail_edit'])
            ->setLabel('Message prédefini');

    }




}