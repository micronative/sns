<?php

namespace Micronative\Sns\Tests\Spec;

use Micronative\Sns\SnsDestination;
use Interop\Queue\Spec\TopicSpec;

class SnsTopicTest extends TopicSpec
{
    protected function createTopic()
    {
        return new SnsDestination(self::EXPECTED_TOPIC_NAME);
    }
}
