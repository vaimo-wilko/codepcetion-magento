<?php

namespace Codeception\Extension;

use Codeception\Events;
use Codeception\Extension;

class Magento extends Extension
{
	public static $events = [
        Events::SUITE_BEFORE    => 'beforeSuite',
        Events::SUITE_AFTER     => 'afterSuite',
    ];

    public function beforeSuite()
    {
    	\Codeception\Module\Magento\App::init($this->config);
    }

    public function afterSuite()
    {
    	\Codeception\Module\Magento\App::reset();
    }
}