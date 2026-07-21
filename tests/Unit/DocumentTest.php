<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Document;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Document::class)]
class DocumentTest extends TestCase {
    public function testToString(): void {
        static::assertSame(
            '',
            (new Document())
                ->__toString()
        );
        static::assertSame(
            'foo',
            (new Document(new Text('foo')))
                ->__toString()
        );
        static::assertSame(
            'foobar',
            (new Document(new Text('foo'), new Text('bar')))
                ->__toString()
        );
    }
}
