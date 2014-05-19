<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {12:02}
 */

namespace Amulet\Service;


use Amulet\App;
use Amulet\Entity\Options\BaseStats;
use Amulet\Entity\Options\CharOptions;
use Amulet\Entity\Options\DefStats;
use Amulet\Entity\Options\WarStats;
use Amulet\Entity\Player;
use Amulet\Exception\EntityRepositoryException;
use Amulet\Exception\PlayerServiceException;
use Amulet\Factory\Config\GameConfig;
use Doctrine\ORM\EntityManager;

class PlayerServiceImpl implements PlayerService, CalculateService
{
    /** @var  EntityManager */
    private $_em;

    /**
     * @param array $data
     * @throws \Amulet\Exception\PlayerServiceException
     * @return Player
     */
    public function createPlayerFromData(array $data)
    {
        if ($this->_fixPlayerData($data)) {
            try {
                $player = $this->getRepository()->findByTitle($data["title"]);
                throw new PlayerServiceException(
                    sprintf("player_exists")
                );
            } catch (EntityRepositoryException $e) {
                /** @var $gameConfig GameConfig */
                $gameConfig = App::init()->configFactory("game");
                $player = new Player();
                $player->setTitle($data["title"])
                    ->setSex($data["sex"])
                    ->setCharClass($data["class"])
                    ->setCharSide($data["side"]);
                $player->setCharOptions(new CharOptions());
                $player->getCharOptions()->setLocation($gameConfig->getStartLoc());
                $player->setCreateTime(time());
                $baseStats = new BaseStats();
                $warStats = new WarStats();
                $defStats = new DefStats();
                switch ($player->getCharClass()) {
                    case PlayerService::CLASS_WARRIOR:
                        $baseStats->setStrenge(10)
                            ->setHealth(10)
                            ->setDexterity(5)
                            ->setAgility(4)
                            ->setIntellegence(2)
                            ->setWill(1);
                        break;
                    case PlayerService::CLASS_MAGE:
                        $baseStats->setIntellegence(10)
                            ->setWill(10)
                            ->setHealth(4)
                            ->setAgility(6)
                            ->setDexterity(4)
                            ->setStrenge(2);
                        break;
                    case PlayerService::CLASS_RANGER:
                        $baseStats->setDexterity(10)
                            ->setHealth(7)
                            ->setStrenge(5)
                            ->setAgility(10)
                            ->setIntellegence(2)
                            ->setWill(1);
                        break;
                }

                $player->setBaseStats($baseStats)
                    ->setWarStats($warStats)
                    ->setDefStats($defStats);
                $this->commit($player);
                return $player;
            }
        } else {
            throw new PlayerServiceException(
                sprintf("data_invalid")
            );
        }
    }

    /**
     * Сохранение игрока
     * @param Player $player
     * @return void
     */
    public function commit(Player $player)
    {
        $this->_em->persist($player->getBaseStats());
        $this->_em->persist($player->getWarStats());
        $this->_em->persist($player->getDefStats());
        $this->_em->persist($player->getCharOptions());
        $this->_em->persist($player->getPlayerOptions());
        $this->_em->flush();
        $this->calculate($player);
        $this->_em->persist($player);
        $this->_em->flush();
    }

    /**
     * @param Player $player
     * @return void
     */
    public function remove(Player $player)
    {
        $this->_em->remove($player);
        $this->_em->flush();
    }

    /**
     * @return PlayerRepository
     */
    public function getRepository()
    {
        return $this->_em->getRepository($this->getRepositoryClass());
    }

    /**
     * @return string
     */
    public function getRepositoryClass()
    {
        return "Amulet\\Entity\\Player";
    }

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEm($em)
    {
        $this->_em = $em;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function _fixPlayerData(array $data)
    {
        $diff = array_diff(
            array_keys($data),
            [
                "title",
                "sex",
                "class",
                "side"
            ]
        );
        return count($diff) < 1;
    }

    /**
     * @param \Amulet\Entity\Player $player
     * @param string $timerId
     * @param int $time
     * @return \Amulet\Entity\Player
     */
    public function setCoolDown(Player $player, $timerId, $time = 1)
    {
        $timers = $player->getCharOptions()->getTimers();
        $timers[$timerId] = time() + $time;
        $player->getCharOptions()->setTimers($timers);
        return $player;
    }

    /**
     * @param \Amulet\Entity\Player $player
     * @param string $timerId
     * @return int
     */
    public function getCoolDown(Player $player, $timerId)
    {
        $timers = $player->getCharOptions()->getTimers();
        return (isset($timers[$timerId])) ? $timers[$timerId] - time() : 0;
    }

    /**
     * @param \Amulet\Entity\Player $player
     * @return Player
     */
    public function clearTimers(Player $player)
    {
        $timers = $player->getCharOptions()->getTimers();
        foreach ($timers as $id => $timer) {
            if ($timer - time() < 1) {
                unset($timers[$id]);
            }
        }
        $player->getCharOptions()->setTimers($timers);
        return $player;
    }

    /**
     * @param Player $player
     * @param string $message
     * @return Player
     */
    public function addMessageToJournal(Player $player, $message)
    {
        $journal = $player->getCharOptions()->getJournal();
        $journal[] = [
            "time" => time(),
            "message" => $message
        ];
        $player->getCharOptions()->setJournal($journal);
        return $player;
    }

    /**
     * @param Player $player
     * @return Player
     */
    public function clearJournal(Player $player)
    {
        /** @var $gameConfig GameConfig */
        $gameConfig = App::init()->configFactory("game");
        $journal = $player->getCharOptions()->getJournal();
        foreach ($journal as $key => $message) {
            if (time() - $message["time"] > $gameConfig->getJournalMessageSaveTime()) {
                unset($journal[$key]);
            }
        }
        $player->getCharOptions()->setJournal($journal);
        return $player;
    }

    /**
     * @param Player $object
     * @return object
     */
    public function calculate($object)
    {
        $baseParams = $object->getBaseStats();

        $maxLife = 10 + $baseParams->getHealth() * 5 + $baseParams->getStrenge() * 2;
        if ($object->getCharClass() == self::CLASS_MAGE) {
            $maxMana = 10 + $baseParams->getWill() * 5 + $baseParams->getIntellegence() * 2;
        } else {
            $maxMana = 100;
        }
        $object->getCharOptions()->setMaxLife($maxLife);
        $object->getCharOptions()->setMaxEnergy($maxMana);
        if (is_null($object->getCharOptions()->getLife())) {
            $object->getCharOptions()->setLife($maxLife);
        }
        if ($object->getCharOptions()->getLife() > $maxLife) {
            $object->getCharOptions()->setLife($maxLife);
        }
        if (is_null(($object->getCharOptions()->getEnergy()))) {
            $object->getCharOptions()->setEnergy($maxMana);
        }
        if ($object->getCharOptions()->getEnergy() > $maxMana) {
            $object->getCharOptions()->setLife($maxMana);
        }
        $this->regen($object);
        return $object;
    }

    /**
     * @param Player $object
     * @return Player
     */
    public function regen($object)
    {
        $lifePerSecond = ceil($object->getBaseStats()->getHealth() / 5);
        $manaPerSecond = ceil($object->getBaseStats()->getWill() / 5);
        if (time() > $object->getCharOptions()->getLastLifeRegenTime() + 1) {
            $k = time() - $object->getCharOptions()->getLastLifeRegenTime();
            if($k < 1) $k = 1;
            $lifeCount = $lifePerSecond * $k;
            if ($object->getCharOptions()->getLife() + $lifeCount > $object->getCharOptions()->getMaxLife()) {
                $lifeCount = $object->getCharOptions()->getMaxLife() - $object->getCharOptions()->getLife();
            }
            $object->getCharOptions()->setLife($object->getCharOptions()->getLife() + $lifeCount);
        }
        $object->getCharOptions()->setLastLifeRegenTime(time());
        //
        if (time() > $object->getCharOptions()->getLastEnergyRegenTime() + 1) {
            switch($object->getCharClass()){
                case self::CLASS_MAGE:
                    $k = time() - $object->getCharOptions()->getLastEnergyRegenTime();
                    if($k < 1) $k = 1;
                    $manaCount = $manaPerSecond * $k;
                    if ($object->getCharOptions()->getEnergy() + $manaCount > $object->getCharOptions()->getMaxEnergy()) {
                        $manaCount = $object->getCharOptions()->getMaxEnergy() - $object->getCharOptions()->getEnergy();
                    }
                    $object->getCharOptions()->setEnergy($object->getCharOptions()->getEnergy() + $manaCount);
                    break;
                case self::CLASS_RANGER:
                case self::CLASS_WARRIOR:
                    if($object->getCharOptions()->getEnergy() > 0){
                        $k = time() - $object->getCharOptions()->getLastEnergyRegenTime();
                        if($k < 1) $k = 1;
                        $energyCount = floor(5 - $object->getBaseStats()->getDexterity() / 5);
                        $energyCount*=$k;
                        if($object->getCharOptions()->getEnergy() - $energyCount < 1){
                            $energyCount = $object->getCharOptions()->getEnergy();
                        }
                        $object->getCharOptions()->setEnergy($object->getCharOptions()->getEnergy() - $energyCount);
                    }
                    break;
                default:

                    break;
            }
        }
        $object->getCharOptions()->setLastEnergyRegenTime(time());
        return $object;
    }

    /**
     * @param Player $player
     * @param int $exp
     * @return Player
     */
    public function addExperience(Player $player, $exp)
    {
        // TODO: Implement addExperience() method.
    }
}