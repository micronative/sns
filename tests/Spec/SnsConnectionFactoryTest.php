<?php

namespace Brighte\Sns\Tests\Spec;

use Brighte\Sns\SnsConnectionFactory;
use Interop\Queue\ConnectionFactory;
use Interop\Queue\Spec\ConnectionFactorySpec;

class SnsConnectionFactoryTest extends ConnectionFactorySpec
{
    /**
     * @return ConnectionFactory
     */
    protected function createConnectionFactory()
    {
        return new SnsConnectionFactory('sns:');
    }
}
