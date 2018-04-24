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
    public function setApiUsageTracker(ApiUsageTrackerInterface $apiTracker)
    {
        $this->apiTracker = $apiTracker;
    }

    /**
     * Logs API usage to the API tracker.
     *
     * @param string $apiName
     * @param string $endpoint
     * @param bool $success
     * @param array $metrics
     */
    public function trackApiUsage(string $apiName, string $endpoint, bool $success = true, array $metrics = [])
    {
        if (!$this->apiTracker) {
            return;
        }

        $this->apiTracker->trackApiUsage($apiName,$endpoint,$success,$metrics);
    }
}