<?php
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpUndefinedMethodInspection */


namespace Silktide\Capiture\Tests\Unit;


use PHPUnit\Framework\TestCase;
use Silktide\Capiture\ApiUsageTracker;
use Silktide\Capiture\ApiUsageTrackerInterface;

class ApiTrackerTest extends TestCase
{

    public function testLoggingThroughTraitWorksAsExpected()
    {
        $apiTrackerMock = $this->createMock(ApiUsageTrackerInterface::class);
        $apiTrackerMock->expects($this->once())
            ->method('trackApiUsage')
            ->willThrowException(new \Exception("Logger called"));

        $mock = $this->getMockForTrait(ApiUsageTracker::class);
        $mock->setApiUsageTracker($apiTrackerMock);
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Logger called');
        $mock->trackApiUsage('api','endpoint',false,[]);

    }

    public function testNoErrorIsThrownWhenNoTrackerIsSet()
    {
        $mock = $this->getMockForTrait(ApiUsageTracker::class);
        $mock->trackApiUsage('api','endpoint',true,[]);
        $this->assertTrue(true);
    }

}