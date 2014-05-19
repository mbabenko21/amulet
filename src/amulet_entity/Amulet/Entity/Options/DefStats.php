<?php

namespace Amulet\Entity\Options;

use Doctrine\ORM\Mapping as ORM;

/**
 * DefStats
 *
 * @ORM\Table(name="def_stats")
 * @ORM\Entity
 */
class DefStats
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
     * @ORM\Column(name="phys_def", type="integer", nullable=true)
     */
    private $phys_def;

    /**
     * @var integer
     *
     * @ORM\Column(name="mag_def", type="integer", nullable=true)
     */
    private $mag_def;

    /**
     * @var integer
     *
     * @ORM\Column(name="block", type="integer", nullable=true)
     */
    private $block;

    /**
     * @var integer
     *
     * @ORM\Column(name="parring", type="integer", nullable=true)
     */
    private $parring;

    /**
     * @var integer
     *
     * @ORM\Column(name="evasion", type="integer", nullable=true)
     */
    private $evasion;

    /**
     * @var integer
     *
     * @ORM\Column(name="fire_resistance", type="integer", nullable=true)
     */
    private $fire_resistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="wind_resistance", type="integer", nullable=true)
     */
    private $wind_resistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="water_resistance", type="integer", nullable=true)
     */
    private $water_resistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="earth_resistance", type="integer", nullable=true)
     */
    private $earth_resistance;


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
     * Set phys_def
     *
     * @param integer $physDef
     *
     * @return DefStats
     */
    public function setPhysDef($physDef)
    {
        $this->phys_def = $physDef;
    
        return $this;
    }

    /**
     * Get phys_def
     *
     * @return integer 
     */
    public function getPhysDef()
    {
        return $this->phys_def;
    }

    /**
     * Set mag_def
     *
     * @param integer $magDef
     *
     * @return DefStats
     */
    public function setMagDef($magDef)
    {
        $this->mag_def = $magDef;
    
        return $this;
    }

    /**
     * Get mag_def
     *
     * @return integer 
     */
    public function getMagDef()
    {
        return $this->mag_def;
    }

    /**
     * Set block
     *
     * @param integer $block
     *
     * @return DefStats
     */
    public function setBlock($block)
    {
        $this->block = $block;
    
        return $this;
    }

    /**
     * Get block
     *
     * @return integer 
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set parring
     *
     * @param integer $parring
     *
     * @return DefStats
     */
    public function setParring($parring)
    {
        $this->parring = $parring;
    
        return $this;
    }

    /**
     * Get parring
     *
     * @return integer 
     */
    public function getParring()
    {
        return $this->parring;
    }

    /**
     * Set evasion
     *
     * @param integer $evasion
     *
     * @return DefStats
     */
    public function setEvasion($evasion)
    {
        $this->evasion = $evasion;
    
        return $this;
    }

    /**
     * Get evasion
     *
     * @return integer 
     */
    public function getEvasion()
    {
        return $this->evasion;
    }

    /**
     * Set fire_resistance
     *
     * @param integer $fireResistance
     *
     * @return DefStats
     */
    public function setFireResistance($fireResistance)
    {
        $this->fire_resistance = $fireResistance;
    
        return $this;
    }

    /**
     * Get fire_resistance
     *
     * @return integer 
     */
    public function getFireResistance()
    {
        return $this->fire_resistance;
    }

    /**
     * Set wind_resistance
     *
     * @param integer $windResistance
     *
     * @return DefStats
     */
    public function setWindResistance($windResistance)
    {
        $this->wind_resistance = $windResistance;
    
        return $this;
    }

    /**
     * Get wind_resistance
     *
     * @return integer 
     */
    public function getWindResistance()
    {
        return $this->wind_resistance;
    }

    /**
     * Set water_resistance
     *
     * @param integer $waterResistance
     *
     * @return DefStats
     */
    public function setWaterResistance($waterResistance)
    {
        $this->water_resistance = $waterResistance;
    
        return $this;
    }

    /**
     * Get water_resistance
     *
     * @return integer 
     */
    public function getWaterResistance()
    {
        return $this->water_resistance;
    }

    /**
     * Set earth_resistance
     *
     * @param integer $earthResistance
     *
     * @return DefStats
     */
    public function setEarthResistance($earthResistance)
    {
        $this->earth_resistance = $earthResistance;
    
        return $this;
    }

    /**
     * Get earth_resistance
     *
     * @return integer 
     */
    public function getEarthResistance()
    {
        return $this->earth_resistance;
    }
}
