<?php

namespace Brighte\Sns\Tests\Spec;

use Brighte\Sns\SnsContext;
use Brighte\Sns\SnsProducer;
use Interop\Queue\Spec\ProducerSpec;

class SnsProducerTest extends ProducerSpec
{
    protected function createProducer()
    {
        return new SnsProducer($this->createMock(SnsContext::class));
    }
}
