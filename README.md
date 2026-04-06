# Grav Shortcode News Ticker Plugin

## About

The "Shortcode News Ticker" plugin provides an animated, horizontal news ticker
for the Grav CMS.

Version 2.0.0 is based on Optimistic Web's Infinite Scroll Animation Effect
Using Only CSS from https://codepen.io/optimisticweb/details/oNOBwBq and
https://www.youtube.com/watch?v=bd9MLIb3DCg  
Copyright (c) 2026 by Optimistic
Web (https://codepen.io/optimisticweb/pen/oNOBwBq)

## Installation

Typically, a plugin should be installed
via [GPM](https://learn.getgrav.org/17/cli-console/grav-cli-gpm) (Grav Package
Manager):

```
$ bin/gpm install shortcode-ticker
```

Alternatively it can be installed via
the [Admin Plugin](https://learn.getgrav.org/17/admin-panel/plugins)

## Usage

Add the `ticker`shortcode with the ticker items as content:

```markdown
[ticker background-color=#fcf8f2 duration=auto item-duration=5s separator=+++]

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

Type: **Duration** or **fixed String** `auto`  
Optional: yes  
Default: `auto`

Time until the ticker animation starts over. If set to `auto` the actual value
is automatically calculated by multiplying the value of `item-duration` with
the numbers of items in the ticker. If set to an actual duration, the value
should be adapted to the number of ticker entries.

### item-duration

Type: **Duration**  
Optional: yes if `duration` is not set to `auto`  
Default: `5s`

Time for one ticker item until the ticker animation starts over. The value is
multiplied with the number of items and used for `duration`.

### separator

Type: **String**  
Optional: yes  
Default: ``

Optional string which is displayed between items, e.g. `+++`
