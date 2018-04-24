<?php


namespace Silktide\Capiture;


interface ApiUsageTrackerInterface
{
    function logApiUsage(string $apiName, string $endpoint, int $usage, array $metrics = []);
}