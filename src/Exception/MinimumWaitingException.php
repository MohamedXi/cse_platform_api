<?php


namespace App\Exception;


class MinimumWaitingException extends CSEException
{
    protected $defaultCode = 403;
    protected $defaultMessage = 'Minimum duration before next rental exceeded';
}