<?php

namespace Xpanel\Bundle\EppBundle\Exception;

/**
 * Class EppNotConnectedException
 * @package Xpanel\Bundle\EppBundle\Exception
 */
class EppNotConnectedException extends EppException
{
    protected $message = 'Not connected to EPP server. Call connect() first.';
}