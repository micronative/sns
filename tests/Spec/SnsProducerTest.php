<?php

namespace Micronative\Sns\Tests\Spec;

use Micronative\Sns\SnsContext;
use Micronative\Sns\SnsProducer;
use Interop\Queue\Spec\ProducerSpec;

class SnsProducerTest extends ProducerSpec
{
    protected function createProducer()
    {
        return new SnsProducer($this->createMock(SnsContext::class));
    }
}
