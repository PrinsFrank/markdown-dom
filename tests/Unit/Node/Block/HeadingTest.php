<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Enum\HeadingLevel;
use PrinsFrank\MarkDownDom\Node\Block\Heading;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Heading::class)]
class HeadingTest extends TestCase {
    public function testConstruct(): void {
        $heading = new Heading(HeadingLevel::Level1);
        static::assertSame(HeadingLevel::Level1, $heading->level);
        static::assertSame([], $heading->children);

        $textNode = new Text('foo');
        $heading = new Heading(HeadingLevel::Level1, $textNode);
        static::assertSame(HeadingLevel::Level1, $heading->level);
        static::assertSame([$textNode], $heading->children);
    }
}
