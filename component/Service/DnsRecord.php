<?php

declare(strict_types=1);

namespace Phant\DomainName\Service;

use Phant\DataStructure\Web\DomainName;

class DnsRecord
{
    public const A		= 'A';
    public const CNAME	= 'CNAME';
    public const HINFO	= 'HINFO';
    public const CAA	= 'CAA';
    public const MX	= 'MX';
    public const NS	= 'NS';
    public const PTR	= 'PTR';
    public const SOA	= 'SOA';
    public const TXT	= 'TXT';
    public const AAAA	= 'AAAA';
    public const SRV	= 'SRV';
    public const NAPTR	= 'NAPTR';
    public const A6	= 'A6';
    public const ALL	= 'ALL';
    public const ANY	= 'ANY';

    private const STANDARDS = [
        self::A		=> \DNS_A,
        self::CNAME	=> \DNS_CNAME,
        self::HINFO	=> \DNS_HINFO,
        self::CAA	=> \DNS_CAA,
        self::MX	=> \DNS_MX,
        self::NS	=> \DNS_NS,
        self::PTR	=> \DNS_PTR,
        self::SOA	=> \DNS_SOA,
        self::TXT	=> \DNS_TXT,
        self::AAAA	=> \DNS_AAAA,
        self::SRV	=> \DNS_SRV,
        self::NAPTR	=> \DNS_NAPTR,
        self::A6	=> \DNS_A6,
        self::ALL	=> \DNS_ALL,
        self::ANY	=> \DNS_ANY,
    ];

    public function get(string|DomainName $domainName, string $record): ?array
    {
        if (is_string($domainName)) {
            $domainName = new DomainName($domainName);
        }

        return dns_get_record((string)$domainName, self::STANDARDS[ $record ]) ?? null;
    }

    public function exist(string|DomainName $domainName, string $record): bool
    {
        if (is_string($domainName)) {
            $domainName = new DomainName($domainName);
        }

        return checkdnsrr((string)$domainName, $record);
    }
}
