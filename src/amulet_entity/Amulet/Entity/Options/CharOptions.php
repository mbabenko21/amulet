<?php

namespace Amulet\Entity\Options;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CharOptions
 *
 * @ORM\Table(name="char_options")
 * @ORM\Entity
 */
class CharOptions
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
     * @var integer
     *
     * @ORM\Column(name="life", type="integer")
     */
    private $life;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_life", type="integer")
     */
    private $max_life;

    /**
     * @var integer
     *
     * @ORM\Column(name="energy", type="integer")
     */
    private $energy;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_energy", type="integer")
     */
    private $max_energy;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer")
     */
    private $experience = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="need_experience", type="integer")
     */
    private $need_experience = 100;

    public function __construct(){
        $this->setTimers([]);
        $this->setJournal([]);
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
     * Set life
     *
     * @param integer $life
     *
     * @return CharOptions
     */
    public function setLife($life)
    {
        $this->life = $life;
    
        return $this;
    }

    /**
     * Get life
     *
     * @return integer 
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set max_life
     *
     * @param integer $maxLife
     *
     * @return CharOptions
     */
    public function setMaxLife($maxLife)
    {
        $this->max_life = $maxLife;
    
        return $this;
    }

    /**
     * Get max_life
     *
     * @return integer 
     */
    public function getMaxLife()
    {
        return $this->max_life;
    }

    /**
     * Set energy
     *
     * @param integer $energy
     *
     * @return CharOptions
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;
    
        return $this;
    }

    /**
     * Get energy
     *
     * @return integer 
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set max_energy
     *
     * @param integer $maxEnergy
     *
     * @return CharOptions
     */
    public function setMaxEnergy($maxEnergy)
    {
        $this->max_energy = $maxEnergy;
    
        return $this;
    }

    /**
     * Get max_energy
     *
     * @return integer 
     */
    public function getMaxEnergy()
    {
        return $this->max_energy;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return CharOptions
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     *
     * @return CharOptions
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set need_experience
     *
     * @param integer $needExperience
     *
     * @return CharOptions
     */
    public function setNeedExperience($needExperience)
    {
        $this->need_experience = $needExperience;
    
        return $this;
    }

    /**
     * Get need_experience
     *
     * @return integer 
     */
    public function getNeedExperience()
    {
        return $this->need_experience;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="is_ghost", type="integer", nullable=true)
     */
    private $is_ghost;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", nullable=true)
     */
    private $location;


    /**
     * Set is_ghost
     *
     * @param integer $isGhost
     *
     * @return CharOptions
     */
    public function setIsGhost($isGhost)
    {
        $this->is_ghost = $isGhost;
    
        return $this;
    }

    /**
     * Get is_ghost
     *
     * @return integer 
     */
    public function getIsGhost()
    {
        return $this->is_ghost;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return CharOptions
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="last_action", type="integer", nullable=true)
     */
    private $last_action;


    /**
     * Set last_action
     *
     * @param integer $lastAction
     *
     * @return CharOptions
     */
    public function setLastAction($lastAction)
    {
        $this->last_action = $lastAction;
    
        return $this;
    }

    /**
     * Get last_action
     *
     * @return integer 
     */
    public function getLastAction()
    {
        return $this->last_action;
    }
    /**
     * @var \stdClass
     *
     * @ORM\Column(name="timers", type="object")
     */
    private $timers;


    /**
     * Set timers
     *
     * @param \stdClass $timers
     *
     * @return CharOptions
     */
    public function setTimers($timers)
    {
        $this->timers = $timers;
    
        return $this;
    }

    /**
     * Get timers
     *
     * @return \stdClass 
     */
    public function getTimers()
    {
        return $this->timers;
    }
    /**
     * @var array
     *
     * @ORM\Column(name="journal", type="array", nullable=true)
     */
    private $journal;


    /**
     * Set journal
     *
     * @param array $journal
     *
     * @return CharOptions
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;
    
        return $this;
    }

    /**
     * Get journal
     *
     * @return array 
     */
    public function getJournal()
    {
        return $this->journal;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="town_location", type="string", nullable=true)
     */
    private $town_location;


    /**
     * Set town_location
     *
     * @param string $townLocation
     *
     * @return CharOptions
     */
    public function setTownLocation($townLocation)
    {
        $this->town_location = $townLocation;
    
        return $this;
    }

    /**
     * Get town_location
     *
     * @return string 
     */
    public function getTownLocation()
    {
        return $this->town_location;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="last_life_regen_time", type="integer", nullable=true)
     */
    private $last_life_regen_time;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_energy_regen_time", type="integer", nullable=true)
     */
    private $last_energy_regen_time;


    /**
     * Set last_life_regen_time
     *
     * @param integer $lastLifeRegenTime
     *
     * @return CharOptions
     */
    public function setLastLifeRegenTime($lastLifeRegenTime)
    {
        $this->last_life_regen_time = $lastLifeRegenTime;
    
        return $this;
    }

    /**
     * Get last_life_regen_time
     *
     * @return integer 
     */
    public function getLastLifeRegenTime()
    {
        return $this->last_life_regen_time;
    }

    /**
     * Set last_energy_regen_time
     *
     * @param integer $lastEnergyRegenTime
     *
     * @return CharOptions
     */
    public function setLastEnergyRegenTime($lastEnergyRegenTime)
    {
        $this->last_energy_regen_time = $lastEnergyRegenTime;
    
        return $this;
    }

    /**
     * Get last_energy_regen_time
     *
     * @return integer 
     */
    public function getLastEnergyRegenTime()
    {
        return $this->last_energy_regen_time;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="gps_loc", type="string", nullable=true)
     */
    private $gps_loc;


    /**
     * Set gps_loc
     *
     * @param string $gpsLoc
     *
     * @return CharOptions
     */
    public function setGpsLoc($gpsLoc)
    {
        $this->gps_loc = $gpsLoc;
    
        return $this;
    }

    /**
     * Get gps_loc
     *
     * @return string 
     */
    public function getGpsLoc()
    {
        return $this->gps_loc;
    }
}
