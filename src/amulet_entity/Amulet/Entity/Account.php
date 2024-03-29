<?php

namespace Amulet\Entity;

use Amulet\Service\AccountService;
use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="accounts")
 * @ORM\Entity(repositoryClass="Amulet\Repository\AccountRepositoryImpl")
 */
class Account
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
     * @ORM\Column(name="username", type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="cookid", type="string", length=50, nullable=true, unique=true)
     */
    private $cookid;

    /**
     * @var integer
     *
     * @ORM\Column(name="role", type="integer")
     */
    private $role = AccountService::DEFAULT_ROLE;

    /**
     * @var \Amulet\Entity\Player
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="current_player_id", referencedColumnName="id", unique=true)
     * })
     */
    private $currentPlayer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Amulet\Entity\Player", mappedBy="account", cascade={"persist","merge"})
     */
    private $players;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setOptions(new AccountOptions());
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
     * Set username
     *
     * @param string $username
     *
     * @return Account
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set cookid
     *
     * @param string $cookid
     *
     * @return Account
     */
    public function setCookid($cookid)
    {
        $this->cookid = $cookid;
    
        return $this;
    }

    /**
     * Get cookid
     *
     * @return string 
     */
    public function getCookid()
    {
        return $this->cookid;
    }

    /**
     * Set role
     *
     * @param integer $role
     *
     * @return Account
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return integer 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set currentPlayer
     *
     * @param \Amulet\Entity\Player $currentPlayer
     *
     * @return Account
     */
    public function setCurrentPlayer(\Amulet\Entity\Player $currentPlayer = null)
    {
        $this->currentPlayer = $currentPlayer;
    
        return $this;
    }

    /**
     * Get currentPlayer
     *
     * @return \Amulet\Entity\Player 
     */
    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * Add players
     *
     * @param \Amulet\Entity\Player $players
     *
     * @return Account
     */
    public function addPlayer(\Amulet\Entity\Player $players)
    {
        $this->players[] = $players;
        $players->setAccount($this);
        return $this;
    }

    /**
     * Remove players
     *
     * @param \Amulet\Entity\Player $players
     */
    public function removePlayer(\Amulet\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }
    /**
     * @var \Amulet\Entity\AccountOptions
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\AccountOptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="options_id", referencedColumnName="id", unique=true)
     * })
     */
    private $options;


    /**
     * Set options
     *
     * @param \Amulet\Entity\AccountOptions $options
     *
     * @return Account
     */
    public function setOptions(\Amulet\Entity\AccountOptions $options = null)
    {
        $this->options = $options;
    
        return $this;
    }

    /**
     * Get options
     *
     * @return \Amulet\Entity\AccountOptions 
     */
    public function getOptions()
    {
        return $this->options;
    }
}
