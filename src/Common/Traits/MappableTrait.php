<?php
/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 5/31/2016
 * Time: 2:42 PM
 */

namespace Common\Traits;
use Common\Mapper\ModelMapperException;
use Common\Mapper\ModelMapper;
use Common\Util\Validation;

trait MappableTrait {

	/**
	 * @param array $data
	 * @throws \InvalidArgumentException
	 * @throws ModelMapperException
	 */
	public function mapFromArray(array $data) {
		$json = json_encode($data);
        if($json === false) {
            throw new \InvalidArgumentException('Invalid array supplied.');
        }
		$object = json_decode($json);
        if($object === null) {
            throw new \InvalidArgumentException('Invalid array supplied.');
        }

		$this->mapFromObject($object);
	}

	/**
	 * @param string $data
	 * @throws \InvalidArgumentException
	 * @throws ModelMapperException
	 */
	public function mapFromJson(string $data) {
		$object = json_decode($data);
        if($object === null) {
            throw new \InvalidArgumentException('Invalid json supplied.');
        }

		$this->mapFromObject($object);
	}

	/**
	 * @param $object
	 * @throws ModelMapperException
	 */
	public function mapFromObject($object) {
		$mapper = new ModelMapper();
		$mapper->map($object, $this);
	}
}