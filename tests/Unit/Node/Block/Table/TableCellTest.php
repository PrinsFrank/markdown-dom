<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block\Table;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableCell;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

#[CoversClass(TableCell::class)]
class TableCellTest extends TestCase {
    public function testConstruct(): void {
        static::assertSame(
            [],
            (new TableCell())->children,
        );

        $textNode = new Text('foo');
        static::assertSame(
            [$textNode],
            (new TableCell($textNode))->children,
        );
    }
}
