<?php


namespace App\Entity\Response;


class ResponseApi
{
    private $code;
    private $success;
    private $data;
    private $message;
    private $errorMessages;

    public function __construct(int $code, bool $success, ?array $data, ?string $message, $errorMessages)
    {
        $this->setCode($code);
        $this->setSuccess($success);
        $this->setData($data);
        $this->setMessage($message);
        $this->setErrorMessages($errorMessages);
    }

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param mixed $success
     */
    public function setSuccess($success): void
    {
        $this->success = $success;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

    /**
     * @param mixed $errorMessages
     */
    public function setErrorMessages($errorMessages): void
    {
        $this->errorMessages = $errorMessages;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

}