<?php


namespace Silktide\Capiture;


interface ApiTrackerInterface
{
    function log(string $apiName, string $endpoint, int $usage, array $metrics = []);
}