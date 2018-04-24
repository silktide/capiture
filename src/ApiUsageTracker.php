<?php


namespace Silktide\Capiture;


trait ApiUsageTracker
{

    /**
     * @var ApiUsageTrackerInterface
     */
    protected $apiTracker;

    /**
     * @param ApiUsageTrackerInterface $apiTracker
     */
    public function setApiTracker(ApiUsageTrackerInterface $apiTracker)
    {
        $this->apiTracker = $apiTracker;
    }

    /**
     * Logs API usage to the API tracker.
     *
     * @param string $apiName
     * @param string $endpoint
     * @param int $usage
     * @param array $metrics
     */
    public function trackApiUsage(string $apiName, string $endpoint, int $usage = 1, array $metrics = [])
    {
        if (!$this->apiTracker) {
            return;
        }

        $this->apiTracker->logApiUsage($apiName,$endpoint,$usage,$metrics);
    }
}