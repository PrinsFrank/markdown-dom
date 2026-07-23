<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Bold;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Bold::class)]
class BoldTest extends TestCase {
    public function testConstruct(): void {
        $bold = new Bold();
        static::assertSame([], $bold->children);

        $textNode = new Text('foo');
        $bold = new Bold($textNode);
        static::assertSame([$textNode], $bold->children);
    }
}
