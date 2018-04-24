<?php


namespace Silktide\Capiture;


interface ApiUsageTrackerInterface
{
    function trackApiUsage(string $apiName, string $endpoint, bool $success = true, array $metrics = []);
}