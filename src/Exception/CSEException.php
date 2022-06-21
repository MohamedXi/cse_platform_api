<?php


namespace App\Exception;


use Throwable;

abstract class CSEException extends \Exception
{
    protected $defaultCode = 400;
    protected $defaultMessage = 'Une erreur est survenue';

    /**
     * CSEException constructor.
     * @param string|null $message
     * @param int|null $code
     * @param Throwable|null $previous
     */
    public function __construct(?string $message = null, ?int $code = null, ?Throwable $previous = null)
    {
        parent::__construct($message ?: $this->defaultMessage, $this->defaultCode, $previous);
    }
}