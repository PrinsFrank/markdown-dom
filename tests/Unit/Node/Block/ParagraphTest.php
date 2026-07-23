<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Block\Paragraph;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Paragraph::class)]
class ParagraphTest extends TestCase {
    public function testConstruct(): void {
        $paragraph = new Paragraph();
        static::assertSame([], $paragraph->children);

        $textNode = new Text('foo');
        $paragraph = new Paragraph($textNode);
        static::assertSame([$textNode], $paragraph->children);
    }
}
