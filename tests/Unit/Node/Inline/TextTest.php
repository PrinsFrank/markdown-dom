<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(Text::class)]
class TextTest extends TestCase {
    public function testToString(): void {
        static::assertSame(
            'foo',
            (new Text('foo'))
                ->__toString()
        );
    }
}
