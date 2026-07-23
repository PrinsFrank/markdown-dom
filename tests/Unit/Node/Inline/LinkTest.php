<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Link;

#[CoversClass(Link::class)]
class LinkTest extends TestCase {
    public function testConstruct(): void {
        $link = new Link('text', 'href');
        static::assertSame('text', $link->text);
        static::assertSame('href', $link->href);
    }
}
