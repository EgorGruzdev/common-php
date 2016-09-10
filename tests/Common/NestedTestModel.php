<?php

/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 7/31/2016
 * Time: 9:49 AM
 */

/**
 * @xmlRoot testModel
 * Class TestModel
 * multi-line comment test
 */
class NestedTestModel {

    /**
     * @var
     */
    public $noType;

    /**
     * @var boolean
     */
    public $boolTrue;

    /**
     * @var boolean
     */
    public $boolFalse;

    /**
     * @var string
     */
    public $string;

    /**
     * @var string
     */
    public $namedString;

    /**
     * @var integer
     */
    public $integer;

    /**
     * @var array
     */
    public $array;

    /**
     * @var string[]
     */
    public $stringArray;

    /**
     * @var integer[]
     */
    public $integerArray;

    /**
     * @var boolean[]
     */
    public $booleanArray;

    /**
     * @var object[]
     */
    public $objectArray;

    /**
     * @var object
     */
    public $object;

    /**
     * @required requiredString
     * @required testRequired
     * @var string
     */
    public $requiredString;

    /**
     * @required
     * @var boolean
     */
    public $alwaysRequiredBoolean;

    /**
     * @required requiredInteger
     * @required testRequired
     * @var integer
     */
    public $multipleRequiredInteger;

    /**
     * @attribute
     * @var string
     */
    public $attribute1;

    /**
     * @rule email
     */
    public $emailRule;

    /**
     * @rule string
     * @rule email
     */
    public $multipleRules;
}