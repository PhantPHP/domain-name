# Domain name

## Requirments

PHP >= 8.0


## Install

`composer require phant/domain-name`

## Usages

### Domain name validation

```php
use Phant\DomainName\DataStructure\DomainName;
use Phant\DomainName\Error\InvalidFormat;

try {
	
	$domainName = new DomainName('domain.ext');
	
} catch (InvalidFormat $e) {
	
	// Domain name format is invalid
	
}

$domainName->getName();
$domainName->getExtension();
```

### DNS record

```php
use Phant\DomainName\DataStructure\DomainName;
use Phant\DomainName\Error\InvalidFormat;
use Phant\DomainName\Service\DnsRecord;

try {
	
	$domainName = new DomainName('domain.ext');
	
} catch (InvalidFormat $e) {
	
	// Domain name format is invalid
	
}

$dnsRecordDetail = (new DnsRecord())->get(
	domainName,
	DnsRecord::A
);

$dnsRecordExist = (new DnsRecord())->exist(
	domainName,
	DnsRecord::A
);
```

### Service provided

```php
use Phant\DomainName\DataStructure\DomainName;
use Phant\DomainName\Error\InvalidFormat;
use Phant\DomainName\Service\ServiceProvided;

try {
	
	$domainName = new DomainName('domain.ext');
	
} catch (InvalidFormat $e) {
	
	// Domain name format is invalid
	
}

$isEmailServiceProvider = (new ServiceProvided())->isEmailServiceProvider(
	domainName
);

$isTrashMailBoxService = (new ServiceProvided())->isTrashMailBoxService(
	domainName
);
```
