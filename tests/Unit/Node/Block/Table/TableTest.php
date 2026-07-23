<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Unit\Node\Block\Table;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Node\Block\Table\Table;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableRow;

#[CoversClass(Table::class)]
class TableTest extends TestCase {
    public function testConstruct(): void {
        $tableRow1 = new TableRow();
        $tableRow2 = new TableRow();

        $table = new Table(null);
        static::assertNull($table->headerRow);
        static::assertSame([], $table->rows);

        $table = new Table($tableRow1, $tableRow2);
        static::assertSame($tableRow1, $table->headerRow);
        static::assertSame([$tableRow2], $table->rows);

        $table = new Table(null, $tableRow1, $tableRow2);
        static::assertNull($table->headerRow);
        static::assertSame([$tableRow1, $tableRow2], $table->rows);
    }
}
