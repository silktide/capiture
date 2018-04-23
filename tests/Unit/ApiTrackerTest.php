<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpUndefinedMethodInspection */


namespace Silktide\Capiture\Tests\Unit;


use PHPUnit\Framework\TestCase;
use Silktide\Capiture\ApiTracker;
use Silktide\Capiture\ApiTrackerInterface;

class ApiTrackerTest extends TestCase
{

    public function testLoggingThroughTraitWorksAsExpected()
    {
        $apiTrackerMock = $this->createMock(ApiTrackerInterface::class);
        $apiTrackerMock->expects($this->once())
            ->method('log')
            ->willThrowException(new \Exception("Logger called"));

        $mock = $this->getMockForTrait(ApiTracker::class);
        $mock->setApiTracker($apiTrackerMock);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Logger called');
        $mock->trackApiUsage('api','endpoint',2,[]);

    }

    public function testNoErrorIsThrownWhenNoTrackerIsSet()
    {
        $mock = $this->getMockForTrait(ApiTracker::class);
        $mock->trackApiUsage('api','endpoint',2,[]);
        $this->assertTrue(true);
    }

}