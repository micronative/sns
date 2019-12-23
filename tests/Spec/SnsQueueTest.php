<?php

namespace Brighte\Sns\Tests\Spec;

use Brighte\Sns\SnsDestination;
use Interop\Queue\Spec\QueueSpec;

class SnsQueueTest extends QueueSpec
{
    protected function createQueue()
    {
        return new SnsDestination(self::EXPECTED_QUEUE_NAME);
    }
}
