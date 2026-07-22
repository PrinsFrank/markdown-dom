<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Renderer;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Document;
use PrinsFrank\MarkDownDom\Node\Block\Table\Table;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableCell;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableRow;
use PrinsFrank\MarkDownDom\Node\Inline\Text;
use PrinsFrank\MarkDownDom\Renderer\TextRenderer;

#[CoversClass(TextRenderer::class)]
class TextRendererTest extends TestCase {
    public function testRenderTable(): void {
        static::assertSame(
            <<<MD
            Header 1 Header 2 Header 3
            Item 1 Item 2 Item 3
            Item A Item B Item C

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Table(
                            new TableRow(
                                new TableCell(new Text('Header 1')),
                                new TableCell(new Text('Header 2')),
                                new TableCell(new Text('Header 3')),
                            ),
                            new TableRow(
                                new TableCell(new Text('Item 1')),
                                new TableCell(new Text('Item 2')),
                                new TableCell(new Text('Item 3')),
                            ),
                            new TableRow(
                                new TableCell(new Text('Item A')),
                                new TableCell(new Text('Item B')),
                                new TableCell(new Text('Item C')),
                            ),
                        ),
                    ),
                ),
        );
    }
}
