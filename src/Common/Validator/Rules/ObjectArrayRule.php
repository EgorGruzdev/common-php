<?php
/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 8/20/2016
 * Time: 10:10 AM
 */

namespace Common\Validator\Rules;
use Common\Models\ModelProperty;
use Common\Util\Validation;
use Common\Validator\IRule;

class ObjectArrayRule implements IRule {

    function getNames() {
        return ['object[]'];
    }

    function validate(ModelProperty $property, array $params = []) {
        Validation::validateArray($property->getPropertyValue());
        foreach($property->getPropertyValue() as $value) {
            Validation::validateObject($value);
        }
    }
}