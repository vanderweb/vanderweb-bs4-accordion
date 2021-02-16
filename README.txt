=== Plugin Name ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://vander-web.com/
Tags: accordion, post_type, taxonomy, options, Bootstrap 4.6, Bootstrap Icons
Requires at least: 5.5.0
Tested up to: 5.6.1
Stable tag: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add Accordions Section and Shortcodes.

== Description ==

This plugin sets up a custom post-type and custom taxonomy to be used as Accordion and Tab content. 

It require Bootstrap 4.6 and Bootstrap Icons 1.2 to run. If the current theme does not load these, they can be loaded with this plugin.


== Installation ==

1. Upload `vanderweb-bs4-accordion.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create a Section in the Accordion menu item called Sections.
4. Create accordions and make sure to assign a Section.
6. Use one of the generated Shortcodes (based on sections), modify with attributes if needed.

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* A change since the previous version.
* Another change.

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
