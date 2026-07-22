<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Image;

#[CoversClass(Image::class)]
class ImageTest extends TestCase {
    public function testToString(): void {
        static::assertSame(
            '![Image](http://example.com)',
            (new Image('Image', 'http://example.com'))
                ->__toString(),
        );
    }
}
