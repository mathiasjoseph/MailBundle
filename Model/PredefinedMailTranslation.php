<?php

namespace Miky\Bundle\MailBundle\Model;


/**
 * PredefinedMailTranslation
 */
class PredefinedMailTranslation
{
    /**
     * @var int
     */
    protected $id;

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


}

