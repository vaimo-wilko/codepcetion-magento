<?php
namespace Magento\Codeception\Helper;

class Magento extends \Codeception\Module
{
    public function replaceModelByMock($name, $mock)
    {
        $mocker = new \Magento\Codeception\Extension\Magento\Mock();
        $mocker->replaceModelByMock($name, $mock);
    }

    public function replaceHelperByMock($name, $mock)
    {
        $mocker = new \Magento\Codeception\Extension\Magento\Mock();
        $mocker->replaceHelperByMock($name, $mock);
    }

    public function replaceSingletonByMock($name, $mock)
    {
        $mocker = new \Magento\Codeception\Extension\Magento\Mock();
        $mocker->replaceSingletonByMock($name, $mock);
    }

    public function removeModelMock($name)
    {
        $mocker = new \Magento\Codeception\Extension\Magento\Mock();
        $mocker->removeModelMock($name);
    }

    public function removeSingletonMock($name)
    {
        $mocker = new \Magento\Codeception\Extension\Magento\Mock();
        $mocker->removeSingleton($name);
    }

    public function removeHelperMock($name)
    {
        $mocker = new \Magento\Codeception\Extension\Magento\Mock();
        $mocker->removeHelper($name);
    }
}
