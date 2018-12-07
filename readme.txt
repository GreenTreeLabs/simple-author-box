=== Simple Author Box ===
Contributors: machothemes, silkalns
Tags: author box, responsive author box, author profile fields, author social icons, profile fields, author bio, author description, author profile, user profile, post author, rtl author box, amp, accelerated mobile pages
Requires at least: 4.6
Requires PHP: 5.6
Tested up to: 4.9
Stable tag: 2.1.3
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Adds a cool responsive author box with social icons on your posts.

== Description ==

**Simple Author Box** adds a responsive author box at the end of your posts, showing the author name, author gravatar and author description. It also adds over 30 social profile fields on WordPress user profile screen, allowing to display the author social icons.

= Main Features =

* Shows author gravatar, name, website, description and social icons
* Fully customizable to match your theme design (style, color, size and text options)
* Nice looking on desktop, laptop, tablet or mobile phones
* Automatically insert the author box at the end of your post
* Option to manually insert the author box on your template file (single.php or author.php)
* Simple Author Box has RTL support
* Simple Author Box has AMP support

**About us:**
We are a young team of WordPress aficionados who love building WordPress plugins & <a href="https://www.machothemes.com/" target="_blank" title="Premium WordPress themes">Premium WordPress themes</a> over on our theme shop. We’re also blogging and wish to help our users find the best <a href="https://www.machothemes.com/blog/cheap-wordpress-hosting/" target="_blank" title="Cheap WordPress Hosting">Cheap WordPress hosting</a>.

== Installation ==

1. Download the plugin (.zip file) on your hard drive.
2. Unzip the zip file contents.
3. Upload the `simple-author-box` folder to the `/wp-content/plugins/` directory.
4. Activate the plugin through the 'Plugins' menu in WordPress.
5. A new sub menu item `Simple Author Box` will appear in your main Settings menu.

== Frequently Asked Questions ==

= Why does the author box not display on a page? =

The Simple Author Box plugin was designed to display the author information on posts, categories, tags, etc. The plugin does not work on pages – it was not designed for this, unfortunately. Adding the shortcode on a blog page will also not work because the plugin won’t have author information to display/will not know which author information to display. Adding the shortcode in a widget that is on a page is another instance when the SAB will not be displayed due to the same reasons. You can add it in a widget, but that widget has to be on a single post.

= Can I remove the SAB from WooCommerce/Category/Tags pages? Can I have only on posts? =

The PRO version of Simple Author Box fixes this.

= I have two author boxes. How can I hide one? =

The second author box might be a theme feature and you will need to turn it off from your theme’s options, or hide it with custom CSS.

= How I can translate the author's biography ? =

You can use 2 plugins in order to do this: Polylang or WPML. Here it is how to translate an author's biography with each plugin:

**Polylang**
When using Polylang a "Biographical Info" textarea is added for each language, this way you can enter the "Biographical Info" for each respective language.

**WPML**
In order to translate the "Biographical Info" using this plugin you have to have the wpml-string-translation plugin installed and the following configurations made:
In the String Translation settings at the bottom you will see a "More options" setting. Click "Edit" then select "Author" from there and finally click "Apply". After this, in the filters above, at "Select strings within domain" select "Authors". This will reveal the strings that can be translated from the author role.

= How can I get support? =

You can get free support either here on the support forums: <a href="https://wordpress.org/support/plugin/simple-author-box">https://wordpress.org/support/plugin/simple-author-box</a>
Or if you send us an email at <a href="mailto:support@machothemes.com">support@machothemes.com</a>

= How can I say thanks? =

You can say thank you by leaving us a review here: <a href="https://wordpress.org/support/plugin/simple-author-box/reviews/#new-post">https://wordpress.org/support/plugin/simple-author-box/reviews/#new-post</a>
Or you can give back by recommending this amazing plugin to your friends!


== Screenshots ==

1. Simple Author Box - Colored icons - squares
2. Simple Author Box - Colored icons - circles
3. Simple Author Box - Grey icons - author square
4. Simple Author Box - Grey icons - author circle
5. Simple Author Box - White icons - grey background
6. Simple Author Box - White icons - blue background
7. Simple Author Box - RTL view 1
8. Simple Author Box - RTL view 2
9. Simple Author Box - Sample 2
10. Simple Author Box - Sample 1
11. Simple Author Box - Responsive view 1
12. Simple Author Box - Responsive view 2
13. Simple Author Box - Responsive view 3
14. Plugin options page, simple view (v1.2)

== Changelog ==

= 2.1.3 = 
* Fixed error on footer.
* Fixed profile image in dashboard ( https://github.com/MachoThemes/simple-author-box/issues/97 )
* Fixed profile image in comments ( https://github.com/MachoThemes/simple-author-box/issues/96 )

= 2.1.2 = 
* Added alt tag for custom profile image.

= 2.1.1 = 
* Minor fixes & version bump

= 2.1.0 =
* Speed improvement ( We removed FA and added icons as SVG's and removed our css file and added inline )
* Added new Social Icon : Mastodont
* Added RTL Support
* Added option to add external url for user avatar
* Added option to control the width of border
* Fixed small issues
See complete list here : https://github.com/MachoThemes/simple-author-box/milestone/7?closed=1

= 2.0.9 =
* AMP CSS fixes & validator

= 2.0.8 = 
* Fixed a small bug re. custom AMP CSS (forgot to add 'px' units for author description paragraphs, browser was interpreting them as em)

= 2.0.7 = 
* Added AMP compatibility
* Fixed some CSS isues & cleaned up the code

= 2.0.6 =
* Initial PRO version release & minor bug fixes
* Saving now remembers the tab you were on

= 2.0.5 =
* Fixed Profile Image of Admin Covers All User's Avatars : https://github.com/MachoThemes/simple-author-box/issues/58

= 2.0.4 =
* Added Snapchat icon:  https://github.com/MachoThemes/simple-author-box/issues/35
* Fixed Shortcode issue: https://github.com/MachoThemes/simple-author-box/issues/33
* Added plugin uninstall feedback: https://github.com/MachoThemes/simple-author-box/issues/40
* Fixes #45 (400 Error Loading Fonts)
* Fixes #47 (Replace button in user profile for add social media)
* Fixes #48 (Move feedback box only to support tab)
* Fixes #49 (Display plugin version)
* Fixes #43 (Add 500px icon)
* Added various UI fixes (edit user profile button in plugin settings page, edit user profile/sab settings visible in author box _Only if user is logged in_ on the frontend)
* Fixes incompatibility with SiteOrigin PageBuilder (fixed in: 406f569dd1eaee54801e1b5359bf101a9e6fd1ea); thanks @AlexGStapleton)
* There was a bug that prevented the following options: "Open author website link in a new tab" && "Add "nofollow" attribute on author website link" when the "show author website" option was toggled to ON. Now it's fixed - yay.
* Fixes #50 (Replace all gravatar instances in wp-admin with SAB custom image)
* Introduces new, simplified UI
* Updated plugin GPL requirements


= 2.0.3 =
* Fixed again the typography issue.
* Fixed email in social icons
* Add Meetup, Quora & Medium social icons

= 2.0.2 =
* Fixed a typography issue
* Added VK

= 2.0.1 =
* Removed simple author box from pages.
* Added new tab in setting page

= 2.0 =
* Included the option to add html to a user's description ( https://github.com/MachoThemes/simple-author-box/issues/23 )
* Fixed Google fonts error ( https://github.com/MachoThemes/simple-author-box/issues/14 )
* Added new features ( https://github.com/MachoThemes/simple-author-box/issues/7 )
* Added the posibility to add custom profile images
* Created a shortcode that can be placed inside the posts' content wherever a user wants
* Improved how you add social links

= 1.9 =
* Removed lang folder, translations are now being handled by GlotPress on w.org
* Fixed a CSS bug ( https://github.com/MachoThemes/simple-author-box/issues/11 )
* Removed ShortPixel Banner ( https://github.com/MachoThemes/simple-author-box/issues/8 )
* Minor UI reworks. The plugin's CSS was overwriting a lot of WordPress Core UI styling
* Removed RTL CSS stylesheets as they weren't being properly handled. Will re-add them at a later date, after the new UI will be released
* Updated the URL that was loading FontAwesome Icons from 4.1 -> 4.7 ( https://github.com/MachoThemes/simple-author-box/issues/9 )
* Fixed oEmbed bug on front-end ( https://github.com/MachoThemes/simple-author-box/issues/2 )
* Added MixCloud Icon ( https://github.com/MachoThemes/simple-author-box/issues/3 )
* Added GoodReads Icon ( https://github.com/MachoThemes/simple-author-box/issues/6 )

= 1.8 =
* Changed plugin authorship

= 1.7 =
* Fixed a small CSS issue.
* Added a recommendation for an image optimization plugin - ShortPixel

= 1.6 =
* Fixed a small CSS issue.

= 1.5 =
* Added XING network social profile field & icon.

= 1.4 =
* Fixed the code snippet provided for manually insert the author box. Thanks to [@mazter3000](http://wordpress.org/support/profile/mazter3000) for the [bug report](http://wordpress.org/support/topic/how-to-insert-code-to-php?replies=7#post-5886931).
* Fixed a line-height issue on author name link.

= 1.3 =
* Fixed a line-height issue on author description text and other small css fixes.

= 1.2 =
* Added author website option, fully configurable.
* Added the ability to manually insert the author box on author.php or archive.php.
* Added two more conditionals to load plugin CSS when need it.
* Fixed some visual appearance of admin options in Google Chrome.
* Updated translation with the new strings.

= 1.1 =
* Removed AIM, Yahoo, and Jabber Fields from the WordPress Profile Page.

= 1.0 =
* Initial release
