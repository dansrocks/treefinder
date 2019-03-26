<?php

namespace TreeFinder\Exceptions;

/**
 * Class BaseException
 *
 * @package TreeFinder\Exceptions
 */
class BaseException extends \Exception
{
    const ERR_CODE = 0;
    const ERR_MESSAGE = 'Unknown exception';

    /**
     * InvalidSideValue constructor.
     */
    public function __construct()
    {
        parent::__construct(static::ERR_MESSAGE, static::ERR_CODE, null);
    }
}