<?php

namespace Brighte\Sns\Tests\Spec;

use Brighte\Sns\SnsDestination;
use Interop\Queue\Spec\TopicSpec;

class SnsTopicTest extends TopicSpec
{
    protected function createTopic()
    {
        return new SnsDestination(self::EXPECTED_TOPIC_NAME);
    }
}
