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
	public function isEmailServiceProvider(DomainName $domainName): bool
	{
		return in_array((string)$domainName, EmailServiceProvider::LIST);
	}
	
	public function isTrashMailBoxService(DomainName $domainName): bool
	{
		return in_array((string)$domainName, TrashMailBoxService::LIST);
	}
}
