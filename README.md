# Grav Shortcode News Ticker Plugin

## About

The "Shortcode News Ticker" plugin provides an animated, horizontal news ticker
for the Grav CMS.

It is based on Duncan Booth's pure CSS ticker
from https://codepen.io/kupuguy/details/GNopye and 
https://gist.github.com/kupuguy/d26a87c2e207c994ad88db1683feb7f2  
Copyright (c) 2025 by Duncan Booth (https://codepen.io/kupuguy/pen/GNopye)

## Installation

Typically a plugin should be installed via [GPM](https://learn.getgrav.org/17/cli-console/grav-cli-gpm) (Grav Package Manager):

```
$ bin/gpm install shortcode-ticker
```

Alternatively it can be installed via the [Admin Plugin](https://learn.getgrav.org/17/admin-panel/plugins)

## Usage

Add the `ticker`shortcode with the ticker items as content:

```markdown
[ticker background-color=#fcf8f2 duration=15s]

- The first item
- [Some text with a link](/news/sample-item)
- You can add 💪🏼 emoticons and _**formatting**_ too

[/ticker]
```

The items of the ticker lines are added as a standard markdown unordered list.

## News Ticker Options

### background-color

Type: **Color**  
Optional: yes  
Default: (no background color)

Sets the background color for the news ticker box

### duration

Type: **Duration**  
Optional: yes  
Default: `30s`

Time until the ticker animation starts over. Should be adapted to the number
of ticker entries
