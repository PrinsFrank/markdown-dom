<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Italic;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Italic::class)]
class ItalicTest extends TestCase {
    public function testConstruct(): void {
        $italic = new Italic();
        static::assertSame([], $italic->children);

        $textNode = new Text('foo');
        $italic = new Italic($textNode);
        static::assertSame([$textNode], $italic->children);
    }
}
