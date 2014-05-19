<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 15.05.14 - {19:47}
 */

namespace Amulet\Service;


use Amulet\Loader\JSON\MapsJSONDataLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\FileLoader;

class TownServiceImpl implements MapService
{
    /** @var  FileLoader */
    protected $loader;
    /** @var  array */
    protected $loc;
    /** @var  array */
    protected $locData;

    public function __construct()
    {
        $locator = new FileLocator(DATA_DIR . "/maps_data");
        $this->loader = new MapsJSONDataLoader($locator);
    }

    /**
     * @param $locId
     * @return MapService
     */
    public function loadLoc($locId)
    {
        $this->locData = $this->_parseLocId($locId);
        $this->loc = $this->loader->load($this->locData["data_file"]);
        return $this;
    }

    /**
     * @internal param $locId
     * @return array
     */
    public function getDoors()
    {
        $map = $this->loc["map"];
        $playerLoc = $this->locData["location"];
        $doors = [];
        if (isset($map[$playerLoc])) {
            $data = explode("#", $map[$playerLoc]);
            $dataDoors = $data[1];
            $dataDoors = explode(",", $dataDoors);
            foreach ($dataDoors as $dataDoor) {
                $dataDoor = explode(":", $dataDoor);
                $doors[] = [
                    "name" => $dataDoor[0],
                    "locId" => implode(".", [$this->locData["base_id"], $dataDoor[1]])
                ];
            }
        }
        return $doors;
    }

    /**
     * @return string
     */
    public function getZoneName()
    {
        $name = $this->loc["name"];
        $map = $this->loc["map"];
        $playerLoc = $this->locData["location"];
        if(isset($map[$playerLoc])){
            $data = explode("#", $map[$playerLoc]);
            $name = $data[0];
        }
        return $name;
    }

    /**
     * @param string $locId
     * @return bool
     */
    public function exists($locId)
    {
        $locData = $this->_parseLocId($locId);
        return (isset($this->loc["map"][$locData["location"]]));
    }


    /**
     * @return array
     */
    public function getMapData()
    {
        $data = [];
        if(isset($this->loc["town_exits"][$this->locData["location"]])){
            $data["gate"] = true;
        }
        $data["map"] = $this->loc;
        unset($data["map"]["map"]);
        return $data;
    }

    /**
     * @return array
     */
    public function getTownData()
    {
        return [
            "id" => $this->loc["id"],
            "name" => $this->loc["name"]
        ];
    }

    private function _parseLocId($locId)
    {
        $locData = explode(".", $locId);
        return [
            "data_file" => $locData[0] . ".json",
            "base_id" => $locData[0],
            "location" => $locData[1]
        ];
    }
}