# Template Tag Replacer
TemplateTagReplacer is a PHP library for replacing template tags in strings. It provides a simple and efficient way to perform both string and regex replacements.

## Features
Tag Replacement: Replace specific tags within strings with given replacement values.
Regex Support: Support for regex-based tag replacements.
Flexible: Easily add or update replacement tags.
Installation
To install this library, you can clone the repository and include it in your PHP project:

## Usage

### Initialization
First, create instances of ReplacementTag with the tags and their replacements:

```php
use ReplacementTag\ReplacementTag;
use ReplacementTag\TemplateTagReplacer;

$tags = [
    new ReplacementTag('username', 'JohnDoe'),
    new ReplacementTag('/{date}/', date('Y-m-d'), true),
];

$replacer = new TemplateTagReplacer($tags);
```

### Replacing Tags
Use the replace method to replace tags in a string:

```php
$template = 'Hello {username}, today is {date}.';
$result = $replacer->replace($template);

echo $result; // Output: Hello JohnDoe, today is 2024-07-25.
```

### Adding More Tags
You can also add more tags dynamically using the push method:

```php
$newTag = new ReplacementTag('{location}', 'New York');
$replacer->push($newTag);

$template = 'Welcome to {location}!';
$result = $replacer->replace($template);

echo $result; // Output: Welcome to New York!
```