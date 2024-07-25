<?php

namespace ReplacementTag;

class ReplacementTag 
{

    /**
     * @var string The tag to replace.
     */
    public string $tag;

    /**
     * @var string The replacement text.
     */
    public string $replacement;

    public bool $isRegex;

    /**
     * ReplacementTag constructor.
     */
    public function __construct(string $tag, string $replacement = '', bool $isRegex = false) 
    {
        $this->tag = $tag;
        $this->replacement = $replacement;
        $this->isRegex = $isRegex;
    }

    /**
     * Get the tag to replace.
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * Get the replacement text.
     */
    public function getReplacement(): string
    {
        return $this->replacement;
    }

    /**
     * Get whether or not the tag is a regex.
     */
    public function isRegex(): bool
    {
        return $this->isRegex;
    }

}
