<?php

namespace Micronative\Sns\Tests\Spec;

use Micronative\Sns\SnsMessage;
use Interop\Queue\Spec\MessageSpec;

class SnsMessageTest extends MessageSpec
{
    protected function createMessage()
    {
        return new SnsMessage();
    }
}
