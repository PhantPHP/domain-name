<?php
declare(strict_types=1);

namespace Phant\DomainName\DataStructure;

use Phant\DomainName\Error\InvalidFormat;

class DomainName
{
	public const PATTERN = '/^((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';
	
	protected string $domainName;
	
	public function __construct(
		string $domainName
	)
	{
		$domainName = preg_replace('/ /', '', $domainName);
		$domainName = strtolower($domainName);
		
		if (!preg_match(self::PATTERN, $domainName)) {
			throw new InvalidFormat((string)$domainName);
		}
		
		$this->domainName = strtolower($domainName);
	}
	
	public function __toString(): string
	{
		return $this->get();
	}
	
	public function get(): string
	{
		return $this->domainName;
	}
	
	public function getName(): ?string
	{
		return preg_split('/(?=\.[^.]+$)/', $this->domainName)[0] ?? null;
	}
	
	public function getExtension(): ?string
	{
		$parts = explode('.', $this->domainName);
		
		return $parts ? end($parts) : null;
	}
}
