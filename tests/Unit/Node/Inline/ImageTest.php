<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\Image;

#[CoversClass(Image::class)]
class ImageTest extends TestCase {
    public function testConstruct(): void {
        $image = new Image('text', 'href');
        static::assertSame('text', $image->text);
        static::assertSame('href', $image->href);
    }
}
