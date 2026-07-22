<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Document;
use PrinsFrank\MarkDownDom\Node\Block\Paragraph;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Document::class)]
class DocumentTest extends TestCase {
    public function testToMarkdown(): void {
        static::assertSame(
            '',
            (new Document())
                ->toMarkdown(),
        );
        static::assertSame(
            'foo',
            (new Document(new Paragraph(new Text('foo'))))
                ->toMarkdown(),
        );
        static::assertSame(
            'foobar',
            (new Document(new Paragraph(new Text('foo'), new Text('bar'))))
                ->toMarkdown(),
        );
    }
}
