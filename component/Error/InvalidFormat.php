<?php
declare(strict_types=1);

namespace Phant\DomainName\Error;

class InvalidFormat extends \Exception
{
	function __construct(string $domainName)
	{
		$this->message = 'The domain name "' . $domainName . '" has an invalid format.';
	}
}
