<?php
declare(strict_types=1);

namespace Test\DataStructure;
use PHPUnit\Framework\TestCase;

use Phant\DomainName\DataStructure\DomainName;
use Phant\DomainName\Error\InvalidFormat;

final class DomainNameTest extends TestCase
{
	public function testConstruct(): void
	{
		$domainName = new DomainName('domain.ext');
		
		$this->assertEquals('domain.ext', (string)$domainName);
		
		$this->assertIsString($domainName->get());
		$this->assertEquals('domain.ext', $domainName->get());
		
		$this->assertIsString($domainName->getName());
		$this->assertEquals('domain', $domainName->getName());
		
		$this->assertIsString($domainName->getExtension());
		$this->assertEquals('ext', $domainName->getExtension());
	}
	
	public function testConstructInvalidFormat(): void
	{
		$this->expectException(InvalidFormat::class);
		
		new DomainName('domain');
	}
}
