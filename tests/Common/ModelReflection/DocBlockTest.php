<?php

/**
 * Created by PhpStorm.
 * User: milos.pejanovic
 * Date: 8/4/2016
 * Time: 11:10 PM
 */
use Common\ModelReflection\DocBlock;

class DocBlockTest extends \PHPUnit\Framework\TestCase {

    /**
     * @var DocBlock
     */
    public $docBlock;

    public function setUp(): void
    {
        $docBlockText = "/**\r\n * @testAnnotation test1\r\n * @testAnnotation test1\r\n * @anotherTestAnnotation test2\r\n */";
        $this->docBlock = new DocBlock($docBlockText);
        parent::setUp();
    }

    /**
     * @param $name
     * @dataProvider validValues
     */
    public function testHasAnnotation($name) {
        $result = $this->docBlock->hasAnnotation($name);
        $this->assertEquals($result, true);
    }

    /**
     * @param $name
     * @dataProvider invalidValues
     */
    public function testHasAnnotationFail($name) {
        $result = $this->docBlock->hasAnnotation($name);
        $this->assertEquals($result, false);
    }

    /**
     * @param $name
     * @param $annotations
     * @dataProvider validValues
     */
    public function testGetFirstAnnotation($name, $annotations) {
        $result = $this->docBlock->getFirstAnnotation($name);
        $this->assertEquals($result, $annotations[$name][0]);
    }

    /**
     * @param $name
     * @dataProvider invalidValues
     */
    public function testGetFirstAnnotationFail($name) {
        $this->expectException(Exception::class);
        $this->docBlock->getFirstAnnotation($name);
    }

    /**
     * @param $name
     * @param $annotations
     * @dataProvider validValues
     */
    public function testGetAnnotation($name, $annotations) {
        $result = $this->docBlock->getAnnotation($name);
        $this->assertEquals($result, $annotations[$name]);
    }

    /**
     * @param $name
     * @dataProvider invalidValues
     */
    public function testGetAnnotationFail($name) {
        $this->expectException(Exception::class);
        $this->docBlock->getAnnotation($name);
    }

    /**
     * @param $name
     * @param $annotations
     * @dataProvider validValues
     */
    public function testGetAnnotations($name, $annotations) {
        $result = $this->docBlock->getAnnotations();
        $this->assertEquals($result, $annotations);
    }

    public function validValues() {
        $annotations = array(
            'testAnnotation' => array('test1', 'test1'),
            'anotherTestAnnotation' => array('test2')
        );

        return array(
            array('testAnnotation', $annotations),
            array('anotherTestAnnotation', $annotations)
        );
    }

    public function invalidValues() {
        return array(
            array('asdf'),
            array('invalidAnnotation'),
            array('')
    );
    }
}
