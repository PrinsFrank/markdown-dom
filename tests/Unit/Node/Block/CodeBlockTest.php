<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Block\CodeBlock;

#[CoversClass(CodeBlock::class)]
class CodeBlockTest extends TestCase {
    public function testConstruct(): void {
        $codeBlock = new CodeBlock('code', 'infostring');
        static::assertSame('code', $codeBlock->code);
        static::assertSame('infostring', $codeBlock->infoString);
    }
}
