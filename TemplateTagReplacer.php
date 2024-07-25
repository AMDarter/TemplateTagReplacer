<?php

namespace ReplacementTag;

use ReplacementTag\ReplacementTag;

class TemplateTagReplacer
{
    /**
     * The list of template tags and their replacement values.
     *
     * @var array
     */
    public $replacementTags = [];

    /**
     * TemplateTagReplacer constructor.
     *
     * @param array $replacementTags An array of ReplacementTag objects to add to the replacer.
     */
    public function __construct(array $replacementTags = [])
    {
        foreach ($replacementTags as $key => $value) {
            if (!($value instanceof ReplacementTag)) {
                unset($replacementTags[$key]);
            }
        }

        $this->replacementTags = $replacementTags;
    }

    /**
     * Replaces all occurrences of template tags in the given string with their corresponding replacement values.
     *
     * @param string $subject The string to search and replace template tags in.
     *
     * @return string The resulting string with all template tags replaced.
     */
    public function replace(string $subject): string
    {
        foreach ($this->replacementTags as $replacementTag) {
            if (!empty($replacementTag->getTag())) {
                if ($replacementTag->isRegex()) {
                    // Use preg_replace for regex patterns
                    $subject = preg_replace($replacementTag->getTag(), $replacementTag->getReplacement(), $subject);
                } else {
                    // Use str_replace for simple string replacements
                    $subject = str_replace($replacementTag->getTag(), $replacementTag->getReplacement(), $subject);
                }
            }
        }

        return $subject;
    }

    /**
     * Adds a new ReplacementTag to the replacer.
     * 
     * @param ReplacementTag $tag The ReplacementTag to add.
     * @return void
     */
    public function push(ReplacementTag $tag): void
    {
        $this->replacementTags[] = $tag;
    }
}
