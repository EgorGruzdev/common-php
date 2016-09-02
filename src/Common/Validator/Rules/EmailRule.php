<?php
/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 8/20/2016
 * Time: 10:10 AM
 */

namespace Common\Validator\Rules;
use Common\Models\ModelProperty;
use Common\Validator\IRule;
use Common\Validator\ModelValidatorException;

class EmailRule implements IRule {

    function getNames() {
        return ['email'];
    }

    function validate(ModelProperty $property, array $params = []) {
        if(filter_var($property->getPropertyValue(), FILTER_VALIDATE_EMAIL) === false) {
            throw new ModelValidatorException('Value is not a valid email.');
        }
    }
}