<?php
/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 5/31/2016
 * Time: 2:42 PM
 */

namespace Common\Traits;
use Common\Mapper\ModelMapper;

trait ConvertibleTrait {

	/**
	 * @return array
	 * @throws \InvalidArgumentException
	 */
	public function toArray() {
		$json = $this->toJson();
		$array = json_decode($json, true);

		if(is_null($array)) {
			throw new \InvalidArgumentException('Cannot convert to array.');
		}

		return $array;
	}

	/**
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function toJson() {
		$mapper = new ModelMapper();
		$unmappedObject = $mapper->unmap($this);
		$json = json_encode($unmappedObject);

		if(!$json) {
			throw new \InvalidArgumentException('Cannot convert to json.');
		}

		return $json;
	}
}