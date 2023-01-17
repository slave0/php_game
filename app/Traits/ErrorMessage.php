<?php

namespace App\Traits;

trait ErrorMessage
{
    /**
     * @var string
     */
    protected string $message;

    /**
     * Установка сообщения об ошибке
     *
     * @param string $message
     * @return void
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * Получение сообщения об ошибке
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Имеется ли сообщение об ошибке
     *
     * @return bool
     */
    public function hasMessage(): bool
    {
        return !empty($this->message);
    }
}
