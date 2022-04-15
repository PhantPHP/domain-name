<?php
declare(strict_types=1);

namespace Phant\DomainName\Service;

use Phant\DomainName\Data\{
	EmailServiceProvider,
	TrashMailBoxService,
};
use Phant\DataStructure\Web\DomainName;

class ServiceProvided
{
	public function isEmailServiceProvider(string|DomainName $domainName): bool
	{
		if (is_string($domainName)) $domainName = new DomainName($domainName);
		
		return in_array((string)$domainName, EmailServiceProvider::LIST);
	}
	
	public function isTrashMailBoxService(string|DomainName $domainName): bool
	{
		if (is_string($domainName)) $domainName = new DomainName($domainName);
		
		return in_array((string)$domainName, TrashMailBoxService::LIST);
	}
}
