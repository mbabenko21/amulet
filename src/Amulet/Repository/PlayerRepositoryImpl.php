<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 12.05.14 - {14:55}
 */

namespace Amulet\Repository;


use Amulet\App;
use Amulet\Entity\Options\CharOptions;
use Amulet\Entity\Player;
use Amulet\Factory\Config\GameConfig;
use Amulet\Service\PlayerRepository;
use Amulet\Service\PlayerService;

class PlayerRepositoryImpl extends AmuletRepository implements PlayerRepository
{

    /**
     * @param string $title
     * @return Player
     */
    public function findByTitle($title)
    {
        $criteria = [
            "title" => $title
        ];

        $player = $this->findOneBy($criteria);
        $this->isPlayer($player);
        return $player;
    }

    /**
     * @param $player
     * @param bool $throw
     * @return bool
     */
    public function isPlayer($player, $throw = true)
    {
        return $this->equals($player, "Amulet\\Entity\\Player", $throw);
    }

    /**
     * @param string $locId
     * @param string $filter
     * @return array
     */
    public function getPlayersByLocId($locId, $filter)
    {
        /** @var $gSettings GameConfig */
        $gSettings = App::init()->configFactory("game");
        $dql = sprintf("SELECT co FROM Amulet\Entity\Options\CharOptions co WHERE co.%s = ?1", $filter);
        $query = $this->_em->createQuery($dql);
        $query->setParameter(1, $locId);
        $options = $query->getResult();
        //$qb->select()
        $players = [];
        if (count($options) > 0) {
            /** @var $option CharOptions */
            foreach ($options as $option) {
                $query = $this->_em->createQuery("SELECT p FROM Amulet\Entity\Player p WHERE p.char_options = ?1");
                $query->setParameter(1, $option->getId());
                $playersList = $query->getResult();
                if (count($playersList) > 0) {
                    /** @var $player Player */
                    $player = $playersList[0];
                    if (time() - $player->getCharOptions()->getLastAction() < $gSettings->getTimeOnline()) {
                        $display = true;
                        if ($filter == PlayerService::IN_TRAVEL and $player->getCharOptions()->getTownLocation() !== null) {
                            $display = false;
                        }
                        if ($display) {
                            $players[] = $player;
                        }
                    }
                }
            }
        }
        return $players;
    }
}