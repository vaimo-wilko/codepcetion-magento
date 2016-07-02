<?php

namespace Magento\Codeception\Extension\Magento;

use \Mage;

class App
{
    private static $_instance;
    protected $_config = array(
        'folder' => 'src',
    );

    public static function init(array $config = array())
    {
        if (null === static::$_instance) {
            static::$_instance = new static;
            static::$_instance->initMagento($config);
        }

        return static::$_instance;
    }

    protected function initMagento(array $config = array())
    {
        $this->_config = array_merge($this->_config, $config);

        if ($file = $this->getBaseDir('app/Mage.php')) {
            Mage::app(null, 'website', array('config_model' => 'Magento\Codeception\Extension\Magento\Config'));
            Mage::getSingleton("core/session", array("name" => "frontend"));
            Mage::app()->setCurrentStore(\Mage_Core_Model_App::DISTRO_STORE_ID);
            Mage::app()->loadArea(\Mage_Core_Model_App_Area::AREA_FRONTEND);
        };

        return false;
    }

    protected function getBaseDir($file = null)
    {
        $baseDir = getcwd();
        $mageDir = $this->_config['folder'];
        $file = "{$baseDir}/{$mageDir}/{$file}";

        if (file_exists($file)) {
            require_once $file;
            return $this;
        }

        return false;
    }

    public function reset()
    {
        \Mage::reset();
    }

    /**
     * is not allowed to call from outside: private!
     *
     */
    private function __construct()
    {
    }
    /**
     * prevent the _instance from being cloned
     *
     * @return void
     */
    private function __clone()
    {
    }
    /**
     * prevent from being unserialized
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}
