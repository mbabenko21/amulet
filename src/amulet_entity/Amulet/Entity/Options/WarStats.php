<?php

namespace Amulet\Entity\Options;

use Doctrine\ORM\Mapping as ORM;

/**
 * WarStats
 *
 * @ORM\Table(name="war_stats")
 * @ORM\Entity
 */
class WarStats
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
     * @ORM\Column(name="attack", type="integer", nullable=true)
     */
    private $attack;

    /**
     * @var integer
     *
     * @ORM\Column(name="accuracy", type="integer", nullable=true)
     */
    private $accuracy;

    /**
     * @var integer
     *
     * @ORM\Column(name="crit_rate", type="integer", nullable=true)
     */
    private $crit_rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack_speed", type="integer", nullable=true)
     */
    private $attack_speed;

    /**
     * @var integer
     *
     * @ORM\Column(name="magic_boost", type="integer", nullable=true)
     */
    private $magic_boost;

    /**
     * @var integer
     *
     * @ORM\Column(name="magic_accuracy", type="integer", nullable=true)
     */
    private $magic_accuracy;

    /**
     * @var integer
     *
     * @ORM\Column(name="speed", type="integer", nullable=true)
     */
    private $speed;


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
     * Set attack
     *
     * @param integer $attack
     *
     * @return WarStats
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;
    
        return $this;
    }

    /**
     * Get attack
     *
     * @return integer 
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set accuracy
     *
     * @param integer $accuracy
     *
     * @return WarStats
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = $accuracy;
    
        return $this;
    }

    /**
     * Get accuracy
     *
     * @return integer 
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

    /**
     * Set crit_rate
     *
     * @param integer $critRate
     *
     * @return WarStats
     */
    public function setCritRate($critRate)
    {
        $this->crit_rate = $critRate;
    
        return $this;
    }

    /**
     * Get crit_rate
     *
     * @return integer 
     */
    public function getCritRate()
    {
        return $this->crit_rate;
    }

    /**
     * Set attack_speed
     *
     * @param integer $attackSpeed
     *
     * @return WarStats
     */
    public function setAttackSpeed($attackSpeed)
    {
        $this->attack_speed = $attackSpeed;
    
        return $this;
    }

    /**
     * Get attack_speed
     *
     * @return integer 
     */
    public function getAttackSpeed()
    {
        return $this->attack_speed;
    }

    /**
     * Set magic_boost
     *
     * @param integer $magicBoost
     *
     * @return WarStats
     */
    public function setMagicBoost($magicBoost)
    {
        $this->magic_boost = $magicBoost;
    
        return $this;
    }

    /**
     * Get magic_boost
     *
     * @return integer 
     */
    public function getMagicBoost()
    {
        return $this->magic_boost;
    }

    /**
     * Set magic_accuracy
     *
     * @param integer $magicAccuracy
     *
     * @return WarStats
     */
    public function setMagicAccuracy($magicAccuracy)
    {
        $this->magic_accuracy = $magicAccuracy;
    
        return $this;
    }

    /**
     * Get magic_accuracy
     *
     * @return integer 
     */
    public function getMagicAccuracy()
    {
        return $this->magic_accuracy;
    }

    /**
     * Set speed
     *
     * @param integer $speed
     *
     * @return WarStats
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    
        return $this;
    }

    /**
     * Get speed
     *
     * @return integer 
     */
    public function getSpeed()
    {
        return $this->speed;
    }
}
