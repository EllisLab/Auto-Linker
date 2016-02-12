# Auto-Linker

Automatically creates links from URLs and/or email addresses contained within the given text.

## Installation

Copy the `auto_linker` folder to your `system/user/addons` folder (you can ignore the rest of this repository's files). In your ExpressionEngine control panel, visit the Add-On Manager and click Install next to "Auto Linker".

## Usage

### `{exp:auto_linker}`

#### Example Usage

Wrap the text to be formatted within the plugin tags, like so:

```
{exp:auto_linker}

    text you want processed

{/exp:auto_linker}
```

or...

```
{exp:auto_linker}

    {custom_field}

{/exp:auto_linker}
```

Note: Mailto links created for email addresses use an obfuscated version of the mailto tag containing ordinal numbers written with JavaScript to help prevent the email address from being harvested by spam bots.

#### Parameters

- `target` - (blank) Links will open in a new window.
- `convert` - (url/email)  Set to "url" to only convert URLs. Set to "email" to only convert email addresses.

## Change Log

### 3.0.1

- Added installation instructions

### 3.0

- Updated plugin to be 3.0 compatible

### 2.0

- Simplified plugin to use the auto_link() function from CodeIgniter's URL helper.
- New optional parameter to choose to auto-link only URLs or email addresses.

### 1.1

- Updated plugin to be 2.0 compatible

## License

Copyright (C) 2004 - 2016 EllisLab, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
ELLISLAB, INC. BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Except as contained in this notice, the name of EllisLab, Inc. shall not be
used in advertising or otherwise to promote the sale, use or other dealings
in this Software without prior written authorization from EllisLab, Inc.
