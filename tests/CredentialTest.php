<?php

declare(strict_types=1);

namespace Devscast\Maxicash\Tests;

use PHPUnit\Framework\TestCase;
use Devscast\Maxicash\Credential;

/**
 * Class CredentialTest.
 *
 * @author bernard-ng <bernard@devscast.tech>
 */
final class CredentialTest extends TestCase
{
    public function testConstructor(): void
    {
        $credential = new Credential('4bc27182c02e4d159f1179d10b3537af', 'eaea1d899d24f9ea47b175ce8d1a4ae');

        $this->assertEquals('merchant_id', $credential->merchantId);
        $this->assertEquals('merchant_key', $credential->merchantKey);
    }

    public function testConstructorEmptyMerchantId(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Merchant ID cannot be empty');

        new Credential('', 'merchant_key');
    }

    public function testConstructorEmptyMerchantKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Merchant Key or password cannot be empty');

        new Credential('merchant_id', '');
    }
}
