<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Inline;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Inline\CodeInline;

#[CoversClass(CodeInline::class)]
class CodeInlineTest extends TestCase {
    public function testConstruct(): void {
        $codeInline = new CodeInline('foo');
        static::assertSame('foo', $codeInline->code);
    }
}
