# Domain name

## Requirments

PHP >= 8.1


## Install

`composer require phant/domain-name`

## Usages

### DNS record

```php
use Phant\DomainName\Service\DnsRecord;

$dnsRecordDetail = (new DnsRecord())->get(
	'domain.ext',
	DnsRecord::A
);

$dnsRecordExist = (new DnsRecord())->exist(
	'domain.ext',
	DnsRecord::A
);
```


### Service provided

```php
use Phant\DomainName\Service\ServiceProvided;

$isEmailServiceProvider = (new ServiceProvided())->isEmailServiceProvider(
	'domain.ext'
);

$isTrashMailBoxService = (new ServiceProvided())->isTrashMailBoxService(
	'domain.ext'
);
```
