<?php

declare(strict_types=1);

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use Phant\DataStructure\Web\DomainName;
use Phant\DomainName\Service\ServiceProvided;

final class ServiceProvidedTest extends TestCase
{
    public function testIsEmailServiceProviderTrue(): void
    {
        $result = (new ServiceProvided())
            ->isEmailServiceProvider(
                'gmail.com'
            );

        $result = (new ServiceProvided())
            ->isEmailServiceProvider(
                new DomainName('gmail.com')
            );

        $this->assertIsBool($result);
        $this->assertEquals(true, $result);
    }

    public function testIsEmailServiceProviderFalse(): void
    {
        $result = (new ServiceProvided())
            ->isEmailServiceProvider(
                'trash-mail.com'
            );

        $result = (new ServiceProvided())
            ->isEmailServiceProvider(
                new DomainName('trash-mail.com')
            );

        $this->assertIsBool($result);
        $this->assertEquals(false, $result);
    }

    public function testIsTrashMailBoxServiceTrue(): void
    {
        $result = (new ServiceProvided())
            ->isTrashMailBoxService(
                'trash-mail.com'
            );

        $result = (new ServiceProvided())
            ->isTrashMailBoxService(
                new DomainName('trash-mail.com')
            );

        $this->assertIsBool($result);
        $this->assertEquals(true, $result);
    }

    public function testIsTrashMailBoxServiceFalse(): void
    {
        $result = (new ServiceProvided())
            ->isTrashMailBoxService(
                'gmail.com'
            );

        $result = (new ServiceProvided())
            ->isTrashMailBoxService(
                new DomainName('gmail.com')
            );

        $this->assertIsBool($result);
        $this->assertEquals(false, $result);
    }
}
