# cAPIpture

[![CircleCI](https://circleci.com/gh/silktide/capiture.svg?style=svg)](https://circleci.com/gh/silktide/capiture)

A very simple interface to track API calls.

**cAPIpture** is used in various Silktide API client libraries with a simple goal of collecting data.

There is no implementation here but this data could be used for various purposes including billing, usage reporting etc.

---
### Getting started

**Install from composer**
```
composer require silkitde/capiture
``` 

**Trait usage**

There is an optional trait which can make life slightly easier by setting up the scaffolding.

Don't forget to set your implementation through the `setApiTracker()` method.

```php
<?php 


use Silktide\Capiture\ApiTracker;

class ApiClient
{
    use ApiTracker;
    
    public function makeRequest()
    {
        $this->trackApiUsage('my-api','https://my.api.com/v1/exciting', 5, ['additional' => 'optional-metrics']);
    }
}

```