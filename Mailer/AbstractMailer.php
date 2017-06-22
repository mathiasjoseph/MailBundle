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
     * AbstractMailer constructor.
     *
     * @param \Swift_Mailer         $mailer
     * @param UrlGeneratorInterface $router
     * @param EngineInterface       $templating
     * @param array                 $parameters
     */
    public function __construct($mailer, UrlGeneratorInterface  $router, EngineInterface $templating, array $parameters = array())
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
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
     * @param string $fromEmail
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $fromEmail, $toEmail)
    {
        // Render the email, use the first line as the subject, and the rest as the body
        $renderedLines = explode("\n", trim($renderedTemplate));
        $subject = $renderedLines[0];
        $body = implode("\n", array_slice($renderedLines, 1));

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($body);

        $this->mailer->send($message);
    }
}