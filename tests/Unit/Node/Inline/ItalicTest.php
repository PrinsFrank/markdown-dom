<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Italic;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Italic::class)]
class ItalicTest extends TestCase {
    public function testToString(): void {
        static::assertSame(
            '*foo*',
            (new Italic(new Text('foo')))
                ->__toString()
        );
        static::assertSame(
            '*foobar*',
            (new Italic(new Text('foo'), new Text('bar')))
                ->__toString()
        );
    }
}
