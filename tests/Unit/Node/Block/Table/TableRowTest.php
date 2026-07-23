<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block\Table;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableCell;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableRow;

#[CoversClass(TableRow::class)]
class TableRowTest extends TestCase {
    public function testConstruct(): void {
        static::assertSame(
            [],
            (new TableRow())->cells,
        );

        $tableCell = new TableCell();
        static::assertSame(
            [$tableCell],
            (new TableRow($tableCell))->cells,
        );
    }
}
