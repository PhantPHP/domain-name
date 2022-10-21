<?php

declare(strict_types=1);

namespace Test\Service;

use PHPUnit\Framework\TestCase;

use Phant\DataStructure\Web\DomainName;
use Phant\DomainName\Service\DnsRecord;

final class DnsRecordTest extends TestCase
{
    public function testGet(): void
    {
        $this->assertIsArray(
            (new DnsRecord())
                ->get(
                    'github.com',
                    DnsRecord::A
                )
        );

        $this->assertIsArray(
            (new DnsRecord())
                ->get(
                    new DomainName('github.com'),
                    DnsRecord::A
                )
        );
    }

    public function testExist(): void
    {
        $this->assertIsBool(
            (new DnsRecord())
                ->exist(
                    'github.com',
                    DnsRecord::A
                )
        );

        $this->assertIsBool(
            (new DnsRecord())
                ->exist(
                    new DomainName('github.com'),
                    DnsRecord::A
                )
        );
    }
}
