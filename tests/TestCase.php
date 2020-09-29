<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{


    /**
     * creates mock object
     *
     * @param $class
     * @param null $definition
     * @return \Mockery\MockInterface
     */
    protected function setMock($class, $definition = null)
    {
        if ($definition === null) {
            $definition = $class;
        }
        $mock = \Mockery::mock($definition);
//        $this->app->instance($class, $mock);

        return $mock;
    }

    /**
     * creates mock object
     *
     * @param $class
     * @param null $definition
     * @return \Mockery\MockInterface
     */
    protected function setPartialMock($class)
    {
        $mock = \Mockery::mock($class)->makePartial();
//        $this->app->instance($class, $mock);

        return $mock;
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     * @throws \Exception
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }


    /**
     * Determine if two associative arrays are similar
     *
     * Both arrays must have the same indexes with identical values
     * without respect to key ordering
     *
     * @param array $a
     * @param array $b
     * @return bool
     */
    public function assertSimilarArray($a, $b)
    {
        // if the indexes don't match, return immediately
        if (count(array_diff_assoc($a, $b))) {
            return false;
        }
        // we know that the indexes, but maybe not values, match.
        // compare the values between the two arrays
        foreach ($a as $k => $v) {
            if ($v !== $b[$k]) {
                return false;
            }
        }
        // we have identical indexes, and no unequal values
        return true;
    }


}
