<?php declare(strict_types=1);

namespace PrinsFrank\MarkDownDom\Renderer;

use Exception;
use Override;
use PrinsFrank\MarkDownDom\Contract\Node;
use PrinsFrank\MarkDownDom\Node\Block\CodeBlock;
use PrinsFrank\MarkDownDom\Node\Block\Heading;
use PrinsFrank\MarkDownDom\Node\Block\Paragraph;
use PrinsFrank\MarkDownDom\Node\Block\Quote;
use PrinsFrank\MarkDownDom\Node\Block\ThematicBreak;
use PrinsFrank\MarkDownDom\Node\Inline\Bold;
use PrinsFrank\MarkDownDom\Node\Inline\Image;
use PrinsFrank\MarkDownDom\Node\Inline\Italic;
use PrinsFrank\MarkDownDom\Node\Inline\Link;
use PrinsFrank\MarkDownDom\Node\Inline\Text;

class TextRenderer extends Renderer {
    /** @throws Exception */
    #[Override]
    protected function renderNode(Node $node): string {
        return match ($node::class) {
            CodeBlock::class => $node->code,
            Heading::class => $this->renderChildren($node->children),
            Paragraph::class => $this->renderChildren($node->children),
            Quote::class => $this->renderChildren($node->children),
            ThematicBreak::class => '',
            Bold::class => $this->renderChildren($node->children),
            Image::class => '',
            Italic::class => $this->renderChildren($node->children),
            Link::class => $node->href,
            Text::class => $node->content,
            default => throw new Exception(),
        };
    }
}
