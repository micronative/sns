<?php

namespace Brighte\Sns\Tests\Spec;

use Brighte\Sns\SnsMessage;
use Interop\Queue\Spec\MessageSpec;

class SnsMessageTest extends MessageSpec
{
    protected function createMessage()
    {
        return new SnsMessage();
    }
}
