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

class MapServiceImpl implements MapService
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
        return isset($this->map[$locData["y"]][$locData["x"]]);
    }

    /**
     * @return array
     */
    public function getMapData()
    {
        return $this->mapData;
    }
}