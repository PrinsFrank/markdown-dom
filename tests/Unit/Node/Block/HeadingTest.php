<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Enum\HeadingLevel;
use PrinsFrank\MarkDownDom\Node\Block\Heading;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Heading::class)]
class HeadingTest extends TestCase {
    public function testToString(): void {
        static::assertSame(
            '# foobar',
            (new Heading(HeadingLevel::Level1, new Text('foo'), new Text('bar')))
                ->__toString()
        );
        static::assertSame(
            '###### foobar',
            (new Heading(HeadingLevel::Level6, new Text('foo'), new Text('bar')))
                ->__toString()
        );
    }
}
