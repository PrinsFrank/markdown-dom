<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Block\Quote;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Quote::class)]
class QuoteTest extends TestCase {
    public function testConstruct(): void {
        $quote = new Quote();
        static::assertSame([], $quote->children);

        $textNode = new Text('foo');
        $quote = new Quote($textNode);
        static::assertSame([$textNode], $quote->children);
    }
}
