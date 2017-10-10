<?php

namespace Miky\Bundle\MailBundle\Model;
use Miky\Component\Core\Model\CommonModelInterface;
use Miky\Component\Core\Model\CommonModelTrait;
use Miky\Component\Resource\Model\ResourceInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * PredefinedMail
 * @UniqueEntity(fields={"context"})
 */
class PredefinedMail implements CommonModelInterface, ResourceInterface
{

    Use CommonModelTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $context;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $body;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

}

