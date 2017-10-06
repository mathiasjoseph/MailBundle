<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/06/17
 * Time: 08:35
 */

namespace Miky\Bundle\MailBundle\Mailer;


use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;

abstract class AbstractMailer implements MailerInterface
{
    /**
     * @var \Swift_Mailer
     */
    protected $mailer;

    /**
     * @var UrlGeneratorInterface
     */
    protected $router;

    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var TranslatorInterface
     */
    protected $translator;

    public function __construct($mailer, RouterInterface $router, EngineInterface $templating, TranslatorInterface $translator, array $parameters = array())
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
        $this->translator = $translator;
        $this->parameters = $parameters;
    }


    /**
     * @return \Swift_Mailer
     */
    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     * @return UrlGeneratorInterface
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @return EngineInterface
     */
    public function getTemplating()
    {
        return $this->templating;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }


    /**
     * @param string $renderedTemplate
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $fromEmail, $toEmail, $subject)
    {
        // Render the email, use the first line as the subject, and the rest as the body
        $renderedLines = explode("\n", trim($renderedTemplate));
        $body = implode("\n", array_slice($renderedLines, 1));

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($body, "text/html");

        $this->mailer->send($message);
    }
}