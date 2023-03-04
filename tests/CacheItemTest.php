<?php
declare(strict_types=1);

namespace WyriHaximus\Tests\React\Cache;

use PHPUnit\Framework\TestCase;
use WyriHaximus\React\Cache\CacheItem;

/**
 * @internal
 */
class CacheItemTest extends TestCase
{
    public function testConstructor(): void {
        $time = 123456;
        $subject = new CacheItem($data = ['abc' => 123], $time);
        self::assertEquals($data, $subject->data());
        self::assertEquals($time, $subject->expiresAt());

        self::assertTrue($subject->hasExpired($time + 1));
        self::assertFalse($subject->hasExpired($time));
        self::assertFalse($subject->hasExpired($time - 1));
    }
}
