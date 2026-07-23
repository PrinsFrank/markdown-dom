<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Tests\Renderer;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PrinsFrank\MarkDownDom\Document;
use PrinsFrank\MarkDownDom\Enum\HeadingLevel;
use PrinsFrank\MarkDownDom\Node\Block\CodeBlock;
use PrinsFrank\MarkDownDom\Node\Block\Heading;
use PrinsFrank\MarkDownDom\Node\Block\Paragraph;
use PrinsFrank\MarkDownDom\Node\Block\Quote;
use PrinsFrank\MarkDownDom\Node\Block\Table\Table;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableCell;
use PrinsFrank\MarkDownDom\Node\Block\Table\TableRow;
use PrinsFrank\MarkDownDom\Node\Block\ThematicBreak;
use PrinsFrank\MarkDownDom\Node\Inline\Bold;
use PrinsFrank\MarkDownDom\Node\Inline\CodeInline;
use PrinsFrank\MarkDownDom\Node\Inline\Image;
use PrinsFrank\MarkDownDom\Node\Inline\Italic;
use PrinsFrank\MarkDownDom\Node\Inline\Link;
use PrinsFrank\MarkDownDom\Node\Inline\Text;
use PrinsFrank\MarkDownDom\Renderer\Renderer;
use PrinsFrank\MarkDownDom\Renderer\TextRenderer;

#[CoversClass(TextRenderer::class)]
#[CoversClass(Renderer::class)]
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
        static::assertSame(
            <<<MD
            Item 1 Item 2 Item 3
            Item A Item B Item C

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Table(
                            null,
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

    public function testRenderCodeBlock(): void {
        static::assertSame(
            <<<MD
            <?php

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new CodeBlock('<?php', null),
                    ),
                ),
        );
        static::assertSame(
            <<<MD
            <?php

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new CodeBlock('<?php', 'php'),
                    ),
                ),
        );
    }

    public function testRenderHeading(): void {
        static::assertSame(
            <<<MD
            foo
            bar

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Heading(HeadingLevel::Level1, new Text('foo')),
                        new Heading(HeadingLevel::Level6, new Text('bar')),
                    ),
                ),
        );
    }

    public function testRenderParagraph(): void {
        static::assertSame(
            <<<MD
            foo
            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(new Text('foo')),
                    ),
                ),
        );
    }

    public function testRenderQuote(): void {
        static::assertSame(
            <<<MD
            This is a quote

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Quote(new Text('This is a quote')),
                    ),
                ),
        );
        static::assertSame(
            <<<MD
            This is a
            multiline quote

            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Quote(new Text("This is a\nmultiline quote")),
                    ),
                ),
        );
    }

    public function testRenderThematicBreak(): void {
        static::assertSame(
            <<<MD



            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new ThematicBreak(),
                    ),
                ),
        );
    }

    public function testRenderBold(): void {
        static::assertSame(
            <<<MD
            foo
            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(
                            new Bold(new Text('foo')),
                        ),
                    ),
                ),
        );
    }

    public function testRenderCodeInline(): void {
        static::assertSame(
            <<<MD
            <?php
            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(
                            new CodeInline('<?php'),
                        ),
                    ),
                ),
        );
    }

    public function testRenderImage(): void {
        static::assertSame(
            '',
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(
                            new Image('text', 'https://example.com'),
                        ),
                    ),
                ),
        );
    }

    public function testRenderItalic(): void {
        static::assertSame(
            <<<MD
            foo
            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(
                            new Italic(new Text('foo')),
                        ),
                    ),
                ),
        );
    }

    public function testRenderLink(): void {
        static::assertSame(
            <<<MD
            https://example.com
            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(
                            new Link('text', 'https://example.com'),
                        ),
                    ),
                ),
        );
    }

    public function testRenderText(): void {
        static::assertSame(
            <<<MD
            foo
            MD,
            (new TextRenderer())
                ->render(
                    new Document(
                        new Paragraph(
                            new Text('foo'),
                        ),
                    ),
                ),
        );
    }
}
