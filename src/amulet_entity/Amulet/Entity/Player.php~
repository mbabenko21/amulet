<?php

namespace Amulet\Entity;

use Amulet\Entity\Options\CharOptions;
use Amulet\Entity\Options\PlayerOptions;
use Amulet\Service\PlayerService;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="players")
 * @ORM\Entity(repositoryClass="Amulet\Repository\PlayerRepositoryImpl")
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=10, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=1)
     */
    private $sex = PlayerService::SEX_MALE;

    /**
     * @var integer
     *
     * @ORM\Column(name="charClass", type="integer", length=2)
     */
    private $charClass = PlayerService::CLASS_WARRIOR;

    /**
     * @var integer
     *
     * @ORM\Column(name="charSide", type="integer", length=1)
     */
    private $charSide = PlayerService::SIDE_LIGHT;

    /**
     * @var \Amulet\Entity\Account
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id", unique=true)
     * })
     */
    private $account;

    public function __construct()
    {
        $this->setCharOptions(new CharOptions());
        $this->setPlayerOptions(new PlayerOptions());
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Player
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set sex
     *
     * @param string $sex
     *
     * @return Player
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set charClass
     *
     * @param integer $charClass
     *
     * @return Player
     */
    public function setCharClass($charClass)
    {
        $this->charClass = $charClass;
    
        return $this;
    }

    /**
     * Get charClass
     *
     * @return integer 
     */
    public function getCharClass()
    {
        return $this->charClass;
    }

    /**
     * Set charSide
     *
     * @param integer $charSide
     *
     * @return Player
     */
    public function setCharSide($charSide)
    {
        $this->charSide = $charSide;
    
        return $this;
    }

    /**
     * Get charSide
     *
     * @return integer 
     */
    public function getCharSide()
    {
        return $this->charSide;
    }

    /**
     * Set account
     *
     * @param \Amulet\Entity\Account $account
     *
     * @return Player
     */
    public function setAccount(\Amulet\Entity\Account $account = null)
    {
        $this->account = $account;
    
        return $this;
    }

    /**
     * Get account
     *
     * @return \Amulet\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
    /**
     * @var \Amulet\Entity\Options\CharOptions
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Options\CharOptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="char_options_id", referencedColumnName="id", unique=true)
     * })
     */
    private $char_options;


    /**
     * Set char_options
     *
     * @param \Amulet\Entity\Options\CharOptions $charOptions
     *
     * @return Player
     */
    public function setCharOptions(\Amulet\Entity\Options\CharOptions $charOptions = null)
    {
        $this->char_options = $charOptions;
    
        return $this;
    }

    /**
     * Get char_options
     *
     * @return \Amulet\Entity\Options\CharOptions 
     */
    public function getCharOptions()
    {
        return $this->char_options;
    }
    /**
     * @var \Amulet\Entity\Options\PlayerOptions
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Options\PlayerOptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_options_id", referencedColumnName="id", unique=true)
     * })
     */
    private $player_options;


    /**
     * Set player_options
     *
     * @param \Amulet\Entity\Options\PlayerOptions $playerOptions
     *
     * @return Player
     */
    public function setPlayerOptions(\Amulet\Entity\Options\PlayerOptions $playerOptions = null)
    {
        $this->player_options = $playerOptions;
    
        return $this;
    }

    /**
     * Get player_options
     *
     * @return \Amulet\Entity\Options\PlayerOptions 
     */
    public function getPlayerOptions()
    {
        return $this->player_options;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="create_time", type="integer")
     */
    private $create_time;


    /**
     * Set create_time
     *
     * @param integer $createTime
     *
     * @return Player
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;
    
        return $this;
    }

    /**
     * Get create_time
     *
     * @return integer 
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }
    /**
     * @var \Amulet\Entity\Options\PlayerStats
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Options\PlayerStats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_stats_id", referencedColumnName="id", unique=true)
     * })
     */
    private $player_stats;


    /**
     * Set player_stats
     *
     * @param \Amulet\Entity\Options\PlayerStats $playerStats
     *
     * @return Player
     */
    public function setPlayerStats(\Amulet\Entity\Options\PlayerStats $playerStats = null)
    {
        $this->player_stats = $playerStats;
    
        return $this;
    }

    /**
     * Get player_stats
     *
     * @return \Amulet\Entity\Options\PlayerStats 
     */
    public function getPlayerStats()
    {
        return $this->player_stats;
    }
    /**
     * @var \Amulet\Entity\Options\BaseStats
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Options\BaseStats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stats_id", referencedColumnName="id", unique=true)
     * })
     */
    private $base_stats;

    /**
     * @var \Amulet\Entity\Options\WarStats
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Options\WarStats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stats_id", referencedColumnName="id", unique=true)
     * })
     */
    private $war_stats;


    /**
     * Set base_stats
     *
     * @param \Amulet\Entity\Options\BaseStats $baseStats
     *
     * @return Player
     */
    public function setBaseStats(\Amulet\Entity\Options\BaseStats $baseStats = null)
    {
        $this->base_stats = $baseStats;
    
        return $this;
    }

    /**
     * Get base_stats
     *
     * @return \Amulet\Entity\Options\BaseStats 
     */
    public function getBaseStats()
    {
        return $this->base_stats;
    }

    /**
     * Set war_stats
     *
     * @param \Amulet\Entity\Options\WarStats $warStats
     *
     * @return Player
     */
    public function setWarStats(\Amulet\Entity\Options\WarStats $warStats = null)
    {
        $this->war_stats = $warStats;
    
        return $this;
    }

    /**
     * Get war_stats
     *
     * @return \Amulet\Entity\Options\WarStats 
     */
    public function getWarStats()
    {
        return $this->war_stats;
    }
    /**
     * @var \Amulet\Entity\Options\DefStats
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Options\DefStats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="def_stats_id", referencedColumnName="id", unique=true, onDelete="CASCADE")
     * })
     */
    private $def_stats;


    /**
     * Set def_stats
     *
     * @param \Amulet\Entity\Options\DefStats $defStats
     *
     * @return Player
     */
    public function setDefStats(\Amulet\Entity\Options\DefStats $defStats = null)
    {
        $this->def_stats = $defStats;
    
        return $this;
    }

    /**
     * Get def_stats
     *
     * @return \Amulet\Entity\Options\DefStats 
     */
    public function getDefStats()
    {
        return $this->def_stats;
    }
}
