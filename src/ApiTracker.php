<?php


namespace Silktide\Capiture;


trait ApiTracker
{

    /**
     * @var ApiTrackerInterface
     */
    protected $apiTracker;

    /**
     * @param ApiTrackerInterface $apiTracker
     */
    public function setApiTracker(ApiTrackerInterface $apiTracker)
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

        $this->apiTracker->log($apiName,$endpoint,$usage,$metrics);
    }
}