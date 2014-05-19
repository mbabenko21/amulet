<?php

namespace Amulet\Entity\Options;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseStats
 *
 * @ORM\Table(name="base_stats")
 * @ORM\Entity
 */
class BaseStats
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
     * @ORM\Column(name="strenge", type="integer")
     */
    private $strenge;

    /**
     * @var integer
     *
     * @ORM\Column(name="dexterity", type="integer")
     */
    private $dexterity;

    /**
     * @var integer
     *
     * @ORM\Column(name="agility", type="integer")
     */
    private $agility;

    /**
     * @var integer
     *
     * @ORM\Column(name="will", type="integer")
     */
    private $will;

    /**
     * @var integer
     *
     * @ORM\Column(name="health", type="integer")
     */
    private $health;

    /**
     * @var integer
     *
     * @ORM\Column(name="hit_points", type="integer")
     */
    private $hit_points;

    /**
     * @var integer
     *
     * @ORM\Column(name="mana_points", type="integer")
     */
    private $mana_points;

    /**
     * @var integer
     *
     * @ORM\Column(name="rage_points", type="integer")
     */
    private $rage_points;

    /**
     * @var integer
     *
     * @ORM\Column(name="energy_points", type="integer")
     */
    private $energy_points;


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
     * Set strenge
     *
     * @param integer $strenge
     *
     * @return BaseStats
     */
    public function setStrenge($strenge)
    {
        $this->strenge = $strenge;
    
        return $this;
    }

    /**
     * Get strenge
     *
     * @return integer 
     */
    public function getStrenge()
    {
        return $this->strenge;
    }

    /**
     * Set dexterity
     *
     * @param integer $dexterity
     *
     * @return BaseStats
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;
    
        return $this;
    }

    /**
     * Get dexterity
     *
     * @return integer 
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * Set agility
     *
     * @param integer $agility
     *
     * @return BaseStats
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;
    
        return $this;
    }

    /**
     * Get agility
     *
     * @return integer 
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set will
     *
     * @param integer $will
     *
     * @return BaseStats
     */
    public function setWill($will)
    {
        $this->will = $will;
    
        return $this;
    }

    /**
     * Get will
     *
     * @return integer 
     */
    public function getWill()
    {
        return $this->will;
    }

    /**
     * Set health
     *
     * @param integer $health
     *
     * @return BaseStats
     */
    public function setHealth($health)
    {
        $this->health = $health;
    
        return $this;
    }

    /**
     * Get health
     *
     * @return integer 
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set hit_points
     *
     * @param integer $hitPoints
     *
     * @return BaseStats
     */
    public function setHitPoints($hitPoints)
    {
        $this->hit_points = $hitPoints;
    
        return $this;
    }

    /**
     * Get hit_points
     *
     * @return integer 
     */
    public function getHitPoints()
    {
        return $this->hit_points;
    }

    /**
     * Set mana_points
     *
     * @param integer $manaPoints
     *
     * @return BaseStats
     */
    public function setManaPoints($manaPoints)
    {
        $this->mana_points = $manaPoints;
    
        return $this;
    }

    /**
     * Get mana_points
     *
     * @return integer 
     */
    public function getManaPoints()
    {
        return $this->mana_points;
    }

    /**
     * Set rage_points
     *
     * @param integer $ragePoints
     *
     * @return BaseStats
     */
    public function setRagePoints($ragePoints)
    {
        $this->rage_points = $ragePoints;
    
        return $this;
    }

    /**
     * Get rage_points
     *
     * @return integer 
     */
    public function getRagePoints()
    {
        return $this->rage_points;
    }

    /**
     * Set energy_points
     *
     * @param integer $energyPoints
     *
     * @return BaseStats
     */
    public function setEnergyPoints($energyPoints)
    {
        $this->energy_points = $energyPoints;
    
        return $this;
    }

    /**
     * Get energy_points
     *
     * @return integer 
     */
    public function getEnergyPoints()
    {
        return $this->energy_points;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="intellegence", type="integer", nullable=true)
     */
    private $intellegence;


    /**
     * Set intellegence
     *
     * @param integer $intellegence
     *
     * @return BaseStats
     */
    public function setIntellegence($intellegence)
    {
        $this->intellegence = $intellegence;
    
        return $this;
    }

    /**
     * Get intellegence
     *
     * @return integer 
     */
    public function getIntellegence()
    {
        return $this->intellegence;
    }
}
