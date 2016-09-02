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
use Common\Validator\ModelValidatorException;

class RequiredRule implements IRule {

    function getNames() {
        return ['required'];
    }

    function validate(ModelProperty $property, array $params = []) {
        if(isset($params[0]) && $property->isRequired()) {
            $requiredAction = $params[0];

            foreach($property->getRequiredActions() as $propertyRequiredAction) {
                if($propertyRequiredAction === $requiredAction || $propertyRequiredAction == '') {
                    if(Validation::isEmpty($property->getPropertyValue())) {
                        throw new ModelValidatorException('Required property cannot be empty.');
                    }
                }
            }
        }
    }
}