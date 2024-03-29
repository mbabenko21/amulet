<?php

namespace DoctrineProxies\__CG__\Amulet\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Account extends \Amulet\Entity\Account implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'id', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'username', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'password', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'cookid', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'role', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'currentPlayer', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'players', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'options');
        }

        return array('__isInitialized__', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'id', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'username', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'password', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'cookid', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'role', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'currentPlayer', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'players', '' . "\0" . 'Amulet\\Entity\\Account' . "\0" . 'options');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Account $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername($username)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', array($username));

        return parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', array());

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', array($password));

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setCookid($cookid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCookid', array($cookid));

        return parent::setCookid($cookid);
    }

    /**
     * {@inheritDoc}
     */
    public function getCookid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCookid', array());

        return parent::getCookid();
    }

    /**
     * {@inheritDoc}
     */
    public function setRole($role)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRole', array($role));

        return parent::setRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function getRole()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRole', array());

        return parent::getRole();
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrentPlayer(\Amulet\Entity\Player $currentPlayer = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentPlayer', array($currentPlayer));

        return parent::setCurrentPlayer($currentPlayer);
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentPlayer()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrentPlayer', array());

        return parent::getCurrentPlayer();
    }

    /**
     * {@inheritDoc}
     */
    public function addPlayer(\Amulet\Entity\Player $players)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPlayer', array($players));

        return parent::addPlayer($players);
    }

    /**
     * {@inheritDoc}
     */
    public function removePlayer(\Amulet\Entity\Player $players)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePlayer', array($players));

        return parent::removePlayer($players);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlayers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlayers', array());

        return parent::getPlayers();
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions(\Amulet\Entity\AccountOptions $options = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOptions', array($options));

        return parent::setOptions($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptions', array());

        return parent::getOptions();
    }

}
