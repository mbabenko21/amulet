<?php

namespace Amulet\Entity\Options;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlayerOptions
 *
 * @ORM\Table(name="players_options")
 * @ORM\Entity
 */
class PlayerOptions
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
     * @ORM\Column(name="learning", type="integer", length=1)
     */
    private $learning = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="learning_action", type="string")
     */
    private $learning_action = "begin";

    /**
     * @var string
     *
     * @ORM\Column(name="start_page", type="string")
     */
    private $start_page = "game_main";

    /**
     * @var \Amulet\Entity\Player
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="player_id", referencedColumnName="id", unique=true)
     * })
     */
    private $player;


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
     * Set learning
     *
     * @param integer $learning
     *
     * @return PlayerOptions
     */
    public function setLearning($learning)
    {
        $this->learning = $learning;
    
        return $this;
    }

    /**
     * Get learning
     *
     * @return integer 
     */
    public function getLearning()
    {
        return $this->learning;
    }

    /**
     * Set learning_action
     *
     * @param string $learningAction
     *
     * @return PlayerOptions
     */
    public function setLearningAction($learningAction)
    {
        $this->learning_action = $learningAction;
    
        return $this;
    }

    /**
     * Get learning_action
     *
     * @return string 
     */
    public function getLearningAction()
    {
        return $this->learning_action;
    }

    /**
     * Set start_page
     *
     * @param string $startPage
     *
     * @return PlayerOptions
     */
    public function setStartPage($startPage)
    {
        $this->start_page = $startPage;
    
        return $this;
    }

    /**
     * Get start_page
     *
     * @return string 
     */
    public function getStartPage()
    {
        return $this->start_page;
    }

    /**
     * Set player
     *
     * @param \Amulet\Entity\Player $player
     *
     * @return PlayerOptions
     */
    public function setPlayer(\Amulet\Entity\Player $player = null)
    {
        $this->player = $player;
    
        return $this;
    }

    /**
     * Get player
     *
     * @return \Amulet\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="display_map", type="integer", length=1, nullable=true)
     */
    private $display_map;


    /**
     * Set display_map
     *
     * @param integer $displayMap
     *
     * @return PlayerOptions
     */
    public function setDisplayMap($displayMap)
    {
        $this->display_map = $displayMap;
    
        return $this;
    }

    /**
     * Get display_map
     *
     * @return integer 
     */
    public function getDisplayMap()
    {
        return $this->display_map;
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
     * @return PlayerOptions
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
     * @var string
     *
     * @ORM\Column(name="dialog_id", type="string", nullable=true)
     */
    private $dialog_id;


    /**
     * Set dialog_id
     *
     * @param string $dialogId
     *
     * @return PlayerOptions
     */
    public function setDialogId($dialogId)
    {
        $this->dialog_id = $dialogId;
    
        return $this;
    }

    /**
     * Get dialog_id
     *
     * @return string 
     */
    public function getDialogId()
    {
        return $this->dialog_id;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="display_journal", type="integer", nullable=true)
     */
    private $display_journal;


    /**
     * Set display_journal
     *
     * @param integer $displayJournal
     *
     * @return PlayerOptions
     */
    public function setDisplayJournal($displayJournal)
    {
        $this->display_journal = $displayJournal;
    
        return $this;
    }

    /**
     * Get display_journal
     *
     * @return integer 
     */
    public function getDisplayJournal()
    {
        return $this->display_journal;
    }
}
