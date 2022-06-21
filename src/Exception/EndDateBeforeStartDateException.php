<?php


namespace App\Exception;


class EndDateBeforeStartDateException extends CSEException
{
    protected $defaultCode = 403;
    protected $defaultMessage = 'The end date must be later than the start date';
}