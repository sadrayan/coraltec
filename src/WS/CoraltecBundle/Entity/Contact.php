<?php
/**
 * Created by PhpStorm.
 * User: sadra
 * Date: 8/2/14
 * Time: 9:58 PM
 */

namespace WS\CoraltecBundle\Entity;


class Contact {
    protected $name;
    protected $email;
    protected $company;
    protected $subject;
    protected $message;
    protected $timeStamp;

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $timeStamp
     */
    public function setTimeStamp(\DateTime $timeStamp = null)
    {
        $this->timeStamp = $timeStamp;
    }

    /**
     * @return mixed
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }
} 