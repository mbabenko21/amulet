<?php
/**
 * Created by PhpStorm.
 * Author: Maks Babenko <mbabenko21@gmail.com>
 * Date: 14.05.14 - {22:30}
 */

namespace Amulet\Service;


use Amulet\Loader\DAT\MapDatLoader;
use Amulet\Loader\JSON\MapsJSONDataLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\FileLoader;

class MapServiceImpl implements MapService, AStarService
{
    /** @var  FileLoader */
    protected $loader;
    /** @var  FileLoader */
    protected $dataLoader;
    /** @var  array */
    protected $map;
    /** @var  array */
    protected $locIdData;
    /** @var  array */
    protected $mapData;
    /** @var  array */
    protected $areas;

    public function __construct()
    {
        $locator = new FileLocator(DATA_DIR . "/maps");
        $locator_data = new FileLocator(DATA_DIR . "/maps_data");
        $this->loader = new MapDatLoader($locator);
        $this->dataLoader = new MapsJSONDataLoader($locator_data);
    }


    /**
     * @internal param string $locId
     *
     * @return array
     */
    public function getDoors()
    {
        $map = $this->map;
        $loc = $this->locIdData;
        $doors = [];
        if (isset($map[$loc["y"]][$loc["x"]]) and $map[$loc["y"]][$loc["x"]] != "") {
            $nY = $loc["y"] - 1;
            $nX = $loc["x"];
            if (isset($map[$nY][$nX]) and $map[$nY][$nX] != "") {
                $doors["nord"] = [
                    "name" => "C",
                    "locId" => implode(".", [$loc["newId"], $nY, $nX])
                ];
            }
            $sY = $loc["y"] + 1;
            $sX = $loc["x"];
            if (isset($map[$sY][$sX]) and $map[$sY][$sX] != "") {
                $doors["south"] = [
                    "name" => "Ю",
                    "locId" => implode(".", [$loc["newId"], $sY, $sX])
                ];
            }
            $wY = $loc["y"];
            $wX = $loc["x"] - 1;
            if (isset($map[$wY][$wX]) and $map[$wY][$wX] != "") {
                $doors["west"] = [
                    "name" => "З",
                    "locId" => implode(".", [$loc["newId"], $wY, $wX])
                ];
            }
            $eY = $loc["y"];
            $eX = $loc["x"] + 1;
            if (isset($map[$eY][$eX]) and $map[$eY][$eX] != "") {
                $doors["east"] = [
                    "name" => "В",
                    "locId" => implode(".", [$loc["newId"], $eY, $eX])
                ];
            }
        }
        return $doors;
    }

    public function getArea($locId)
    {
        foreach ($this->areas as $key => $area) {
            if (isset($area["locations"][$locId])) {
                return $area;
            }
        }
        return [
            "name" => "Лайкдимион"
        ];
    }


    /**
     * @param $locId
     * @return array
     */
    protected function _parseLocId($locId)
    {
        $locId = explode(".", $locId);
        $map = [
            "file" => $locId[0] . ".dat",
            "data_file" => $locId[0] . ".json",
            "x" => $locId[2],
            "y" => $locId[1],
            "newId" => $locId[0]
        ];
        return $map;
    }

    /**
     * @param $locId
     * @return MapService
     */
    public function loadLoc($locId)
    {
        $this->locIdData = $this->_parseLocId($locId);
        $this->map = $this->loader->load($this->locIdData["file"]);
        $this->mapData = $this->dataLoader->load($this->locIdData["data_file"]);
        $this->areas = [];
        foreach ($this->mapData["areas"] as $key => $area) {
            $this->areas[$key] = $area;
            for ($x = $area["loc_range"]["x"][0]; $x <= $area["loc_range"]["x"][1]; $x++) {
                for ($y = $area["loc_range"]["y"][0]; $y <= $area["loc_range"]["y"][1]; $y++) {
                    $this->areas[$key]["locations"][implode(".", [$this->locIdData["newId"], $y, $x])] = 1;
                }
            }
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getLocIdData()
    {
        return $this->locIdData;
    }

    /**
     * @return string
     */
    public function getZoneName()
    {
        return $this->mapData["name"];
    }

    /**
     * @param string $locId
     * @return bool
     */
    public function exists($locId)
    {
        $locData = $this->_parseLocId($locId);
        $isset =  isset($this->map[$locData["y"]][$locData["x"]]) && $this->map[$locData["y"]][$locData["x"]] != "";
        return $isset;
    }

    /**
     * @return array
     */
    public function getMapData()
    {
        return $this->mapData;
    }

    /** @var array */
    private $_aStarOpenList = [], $_aStartCloseList = [], $_aStarEndLoc = "";

    /**
     * @param string $startLoc
     * @param string $endLoc
     * @return array
     */
    public function scan($startLoc, $endLoc)
    {
        /*$way = [];
        $map = $this->map;
        $this->_aStarEndLoc = $endLoc;
        $FS = [];
        if ($this->exists($startLoc) and $this->exists($endLoc)) {
            if (!isset($this->_aStartCloseList[$startLoc])) {
                $this->_addToOpenList($startLoc);
                $ceils = $this->_searchAvailableCeil($startLoc);
                $this->_addToCloseList($startLoc);
                $this->_removeLocFromOpenList($startLoc);
                foreach ($ceils as $ceil) {
                    $this->_addToOpenList($ceil["loc"], $ceil["parent"]);
                }
                $min = $this->_nextLoc();
                $this->_addToCloseList($min);
                $this->_removeLocFromOpenList($min);
                $this->scan($min, $endLoc);
            }
        }
        return $this;*/
        $startLocData = $this->_parseLocId($startLoc);
        $endLocData = $this->_parseLocId($endLoc);
        $map = $this->map;
        $aStar = new AStar($this->map, $startLocData["y"], $startLocData["x"], $endLocData["y"], $endLocData["x"]);
        $find = $aStar->findShortestPath();
        $p = $aStar->shortestPath;
        $locs = [];
        foreach ($p as $y => $xx) {
            if ($y != -1) {
                foreach ($xx as $x => $val) {
                    $loc = implode(".", [$this->locIdData["newId"], $y, $x]);
                    $locs[$loc] = true;
                }
            }
        }
        $this->_aStartCloseList = $locs;
        return $this;
    }

    /**
     * @internal param $locId
     * @internal param $endLoc
     * @return int
     */
    private function _nextLoc()
    {
        $min = array_shift($this->_aStarOpenList);
        foreach ($this->_aStarOpenList as $ceil) {
            if ($ceil["f"] < $min["f"]) {
                $min = $ceil;
            }
        }
        return implode(".", [$this->locIdData["newId"], $min["y"], $min["x"]]);
    }

    /**
     * @param string $locId
     * @param string $parentLocId
     * @return void
     */
    private function _addToOpenList($locId, $parentLocId = "")
    {
        $locData = $this->_parseLocId($locId);
        $parentLocData = [];
        if ($parentLocId != "") {
            $parentLocData = $this->_parseLocId($parentLocId);
        }
        $this->_aStarOpenList[$locId] = [
            "x" => $locData["x"],
            "y" => $locData["y"],
            "f" => $this->_manhattan($locId, $this->_aStarEndLoc) + 10,
            "parent" => $parentLocData
        ];
    }

    /**
     * @param string $locId
     * @param string $parentLocId
     * @return void
     */
    private function _addToCloseList($locId, $parentLocId = "")
    {
        $locData = $this->_parseLocId($locId);
        $parentLocData = [];
        if ($parentLocId != "") {
            $parentLocData = $this->_parseLocId($parentLocId);
        }
        $this->_aStartCloseList[$locId] = [
            "x" => $locData["x"],
            "y" => $locData["y"],
            "f" => $this->_manhattan($locId, $this->_aStarEndLoc) + 10,
            "parent" => $parentLocData
        ];
    }

    /**
     * @param string $locId
     */
    private function _removeLocFromOpenList($locId)
    {
        if (isset($this->_aStarOpenList[$locId])) {
            unset($this->_aStarOpenList[$locId]);
        }
    }

    private function _getFromOpenList($locId)
    {
        $loc = [];
        if (isset($this->_aStarOpenList[$locId])) {
            $loc = $this->_aStarOpenList[$locId];
        }
        return $loc;
    }

    private function _searchAvailableCeil($locId)
    {
        $map = $this->map;
        $loc = $this->_parseLocId($locId);
        $doors = [];
        if (isset($map[$loc["y"]][$loc["x"]]) and $map[$loc["y"]][$loc["x"]] != "") {
            $nY = $loc["y"] - 1;
            $nX = $loc["x"];
            if (isset($map[$nY][$nX]) and $map[$nY][$nX] != "") {
                $doors[] = [
                    "parent" => $locId,
                    "loc" => implode(".", [$loc["newId"], $nY, $nX])
                ];
            }
            $sY = $loc["y"] + 1;
            $sX = $loc["x"];
            if (isset($map[$sY][$sX]) and $map[$sY][$sX] != "") {
                $doors[] = [
                    "parent" => $locId,
                    "loc" => implode(".", [$loc["newId"], $sY, $sX])
                ];
            }
            $wY = $loc["y"];
            $wX = $loc["x"] - 1;
            if (isset($map[$wY][$wX]) and $map[$wY][$wX] != "") {
                $doors[] = [
                    "parent" => $locId,
                    "loc" => implode(".", [$loc["newId"], $wY, $wX])
                ];
            }
            $eY = $loc["y"];
            $eX = $loc["x"] + 1;
            if (isset($map[$eY][$eX]) and $map[$eY][$eX] != "") {
                $doors[] = [
                    "parent" => $locId,
                    "loc" => implode(".", [$loc["newId"], $eY, $eX])
                ];
            }
        }
        return $doors;
    }

    /**
     * H = 10*(abs(currentX-targetX) + abs(currentY-targetY))
     * @param string $startLoc
     * @param string $endLoc
     * @return number
     */
    private function _manhattan($startLoc, $endLoc)
    {
        $startLocData = $this->_parseLocId($startLoc);
        $endLocData = $this->_parseLocId($endLoc);
        return 10 * (abs($startLocData["x"] - $endLocData["x"]) + abs($startLocData["y"] - $endLocData["y"]));
    }

    /**
     * @param string $startLoc
     * @param string $endLoc
     * @return string
     */
    public function getNextLoc($startLoc, $endLoc)
    {
        // TODO: Implement getNextLoc() method.
    }

    /**
     * @return array
     */
    public function getCloseList()
    {
        return $this->_aStartCloseList;
    }
}