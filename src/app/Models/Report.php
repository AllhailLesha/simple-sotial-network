<?php

namespace App\Models;

use App\Application\Database\Model;

class Report extends Model
{
    protected string $tableName = 'reports';

    protected array $fields = ['email', 'subject', 'message'];

    protected string $email;

    protected string $subject;

    protected string $message;

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Get the value of subject
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * Get the value of message
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set the value of message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
