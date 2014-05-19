<?php

namespace DoctrineProxies\__CG__\Amulet\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Player extends \Amulet\Entity\Player implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'id', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'title', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'sex', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'charClass', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'charSide', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'account', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'char_options', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'player_options', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'create_time', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'player_stats', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'base_stats', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'war_stats', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'def_stats');
        }

        return array('__isInitialized__', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'id', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'title', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'sex', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'charClass', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'charSide', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'account', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'char_options', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'player_options', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'create_time', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'player_stats', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'base_stats', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'war_stats', '' . "\0" . 'Amulet\\Entity\\Player' . "\0" . 'def_stats');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Player $proxy) {
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
    public function setTitle($title)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitle', array($title));

        return parent::setTitle($title);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitle', array());

        return parent::getTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setSex($sex)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSex', array($sex));

        return parent::setSex($sex);
    }

    /**
     * {@inheritDoc}
     */
    public function getSex()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSex', array());

        return parent::getSex();
    }

    /**
     * {@inheritDoc}
     */
    public function setCharClass($charClass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCharClass', array($charClass));

        return parent::setCharClass($charClass);
    }

    /**
     * {@inheritDoc}
     */
    public function getCharClass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCharClass', array());

        return parent::getCharClass();
    }

    /**
     * {@inheritDoc}
     */
    public function setCharSide($charSide)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCharSide', array($charSide));

        return parent::setCharSide($charSide);
    }

    /**
     * {@inheritDoc}
     */
    public function getCharSide()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCharSide', array());

        return parent::getCharSide();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccount(\Amulet\Entity\Account $account = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccount', array($account));

        return parent::setAccount($account);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccount', array());

        return parent::getAccount();
    }

    /**
     * {@inheritDoc}
     */
    public function setCharOptions(\Amulet\Entity\Options\CharOptions $charOptions = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCharOptions', array($charOptions));

        return parent::setCharOptions($charOptions);
    }

    /**
     * {@inheritDoc}
     */
    public function getCharOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCharOptions', array());

        return parent::getCharOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlayerOptions(\Amulet\Entity\Options\PlayerOptions $playerOptions = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlayerOptions', array($playerOptions));

        return parent::setPlayerOptions($playerOptions);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlayerOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlayerOptions', array());

        return parent::getPlayerOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreateTime($createTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreateTime', array($createTime));

        return parent::setCreateTime($createTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreateTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreateTime', array());

        return parent::getCreateTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setPlayerStats(\Amulet\Entity\Options\PlayerStats $playerStats = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPlayerStats', array($playerStats));

        return parent::setPlayerStats($playerStats);
    }

    /**
     * {@inheritDoc}
     */
    public function getPlayerStats()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPlayerStats', array());

        return parent::getPlayerStats();
    }

    /**
     * {@inheritDoc}
     */
    public function setBaseStats(\Amulet\Entity\Options\BaseStats $baseStats = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBaseStats', array($baseStats));

        return parent::setBaseStats($baseStats);
    }

    /**
     * {@inheritDoc}
     */
    public function getBaseStats()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBaseStats', array());

        return parent::getBaseStats();
    }

    /**
     * {@inheritDoc}
     */
    public function setWarStats(\Amulet\Entity\Options\WarStats $warStats = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWarStats', array($warStats));

        return parent::setWarStats($warStats);
    }

    /**
     * {@inheritDoc}
     */
    public function getWarStats()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWarStats', array());

        return parent::getWarStats();
    }

    /**
     * {@inheritDoc}
     */
    public function setDefStats(\Amulet\Entity\Options\DefStats $defStats = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDefStats', array($defStats));

        return parent::setDefStats($defStats);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefStats()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDefStats', array());

        return parent::getDefStats();
    }

}