<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_ModuleManager
 */

namespace Zend\ModuleManager;

use Zend\EventManager\Event;

/**
 * Custom event for use with module manager
 * Composes Module objects
 *
 * @category Zend
 * @package  Zend_ModuleManager
 */
class ModuleEvent extends Event
{
    /**
     * Module events triggered by eventmanager
     */
    CONST EVENT_LOAD_MODULES        = 'loadModules';
    CONST EVENT_LOAD_MODULE_RESOLVE = 'loadModule.resolve';
    CONST EVENT_LOAD_MODULE         = 'loadModule';
    CONST EVENT_LOAD_MODULES_POST   = 'loadModules.post';

    /**
     * Get the name of a given module
     *
     * @return string
     */
    public function getModuleName()
    {
        return $this->getParam('moduleName');
    }

    /**
     * Set the name of a given module
     *
     * @param  string $moduleName
     * @return ModuleEvent
     */
    public function setModuleName($moduleName)
    {
        if (!is_string($moduleName)) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s expects a string as an argument; %s provided'
                ,__METHOD__, gettype($moduleName)
            ));
        }
        $this->setParam('moduleName', $moduleName);
        return $this;
    }

    /**
     * Get module object
     *
     * @return null|object
     */
    public function getModule()
    {
        return $this->getParam('module');
    }

    /**
     * Set module object to compose in this event
     *
     * @param  object $module
     * @return ModuleEvent
     */
    public function setModule($module)
    {
        if (!is_object($module)) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s expects a module object as an argument; %s provided'
                ,__METHOD__, gettype($module)
            ));
        }
        $this->setParam('module', $module);
        return $this;
    }

    /**
     * Get the config listner
     *
     * @return null|Listener\ConfigMergerInterface
     */
    public function getConfigListener()
    {
        return $this->getParam('configListener');
    }

    /**
     * Set module object to compose in this event
     *
     * @param  Listener\ConfigMergerInterface $configListener
     * @return ModuleEvent
     */
    public function setConfigListener(Listener\ConfigMergerInterface $configListener)
    {
        $this->setParam('configListener', $configListener);
        return $this;
    }
}
