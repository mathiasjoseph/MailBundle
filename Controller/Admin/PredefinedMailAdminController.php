<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Bundle\MailBundle\Controller\Admin;

use FOS\RestBundle\Controller\FOSRestController;
use Miky\Bundle\MailBundle\Model\BasePredefinedMailSchema;
use Miky\Bundle\SettingsBundle\Form\Factory\SettingsFormFactoryInterface;
use Miky\Bundle\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Validator\Exception\ValidatorException;


class PredefinedMailAdminController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function updateAction(Request $request)
    {
        $predefinedMailManager = $this->getPredefinedMailManager();

        /**
         * @var BasePredefinedMailSchema[]
         */
        $schemas = $this->get("miky.registry.mail_predefined_schema")->all();
        $predefinedMails = array();
//        foreach ($schemas as $key => $value){
//            if ($fin)
//        }
//
//        $form = $this
//            ->getSettingsFormFactory()
//            ->create($schemaAlias, $settings)
//        ;

//        if ($form->handleRequest($request)->isValid()) {
//
//        }

        return $this->render("MikyMailBundle:Admin/PredefinedMail:update.html.twig", array(
//            'settings' => $settings,
          //  'form' => $form->createView(),
        ));
    }


    protected function getPredefinedMailManager()
    {
        return $this->get('miky_predefined_mail_manager');
    }

    /**
     * @return SettingsFormFactoryInterface
     */
    protected function getSettingsFormFactory()
    {
        return $this->get('miky.settings.form_factory');
    }

    /**
     * @return TranslatorInterface
     */
    protected function getTranslator()
    {
        return $this->get('translator');
    }


}
