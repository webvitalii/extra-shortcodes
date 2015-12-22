=== Extra-shortcodes ===
Contributors: webvitaly
Donate link: http://web-profile.com.ua/donate/
Tags: shortcode, shortcodes, bloginfo, name, date, date_i18n, time, year, month, week, day
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.6
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

[bloginfo show="name"], [site_name], [site_desc], [date format="l jS \\of F Y"], [date_i18n], [time], [year], [month_name], [day]

== Description ==
> [WordPress Pro plugins](http://codecanyon.net/popular_item/by_category?category=wordpress&ref=webvitaly) |
> [Extra-shortcodes](http://web-profile.com.ua/wordpress/plugins/extra-shortcodes/ "Plugin page") |
> [Donate](http://web-profile.com.ua/donate/ "Support the development")


= Shortcodes: =
* `[bloginfo show="name"]` - [bloginfo params](http://codex.wordpress.org/Function_Reference/get_bloginfo);
* `[site_name]` - Name of the site;
* `[site_desc]` - Description of the site;
* `[site_url]` - http://site.url;
* `[wp_version]` - 3.5 (WordPress version);
* `[date format="l jS \\of F Y h:i:s A"]` - Monday 23rd April 2012 09:37:57 AM; [php date format params](http://php.net/manual/en/function.date.php);
* `[date format="l jS \\of F Y h:i:s A" timestamp="+2 years +3 months -20 days -10 hours +30 minutes"]` - Thursday 3rd July 2014 06:52:57 AM; [relative datetime formats](http://www.php.net/manual/en/datetime.formats.relative.php);
* `[date format="h:i:s A" use_wordpress_timezone="1"]` - use WordPress timezone from Settings section;
* `[date_i18n format="l jS \\of F Y h:i:s A" timestamp="+2 years +3 months -20 days -10 hours +30 minutes"]` - Четвер, 3 Липня 2014 06:52:57; shortcode based on [date_i18n](http://codex.wordpress.org/Function_Reference/date_i18n);
* `[time format="h:i:s A"]` - 01:35:08 PM; [php time format params](http://php.net/manual/en/function.date.php);
* `[year]` - 2012, `[year plus="3"]` - 2015, `[year minus="2"]` - 2010;
* `[month]` - 4 (in April), `[month plus="10"]` - 2, `[month minus="8"]` - 8;
* `[month_name]` - April, `[month_name plus="10"]` - February, `[month_name minus="8"]` - August;
* `[day]` - 8, `[day plus="3"]` - 11, `[day minus="2"]` - 6;
* `[weekday]` - Monday, `[weekday plus="5"]` - Saturday, `[weekday minus="5"]` - Wednesday;
* `[hours]`, `[minutes]`, `[seconds]`;


= Useful: =
* ["Anti-spam" - block spam in comments](http://wordpress.org/plugins/anti-spam/ "no spam, no captcha")
* ["Page-list" - show list of pages with shortcodes](http://wordpress.org/plugins/page-list/ "list of pages with shortcodes")
* [WordPress Pro plugins](http://codecanyon.net/popular_item/by_category?category=wordpress&ref=webvitaly)


== Changelog ==

= 1.6 - 2014-02-14 =
* added 'use_wordpress_timezone' param to [date] shortcode;

= 1.5 - 2012-12-13 =
* added [date_i18n] (thanks to HeldZ)

= 1.4 - 2012-11-06 =
* minor changes

= 1.3 =
* refactor code (all based on [relative datetime formats](http://www.php.net/manual/en/datetime.formats.relative.php))
* reorganized docs
* removed "loop" param

= 1.2 =
* added "timestamp" param to [date] shortcode

= 1.1 =
* added [bloginfo]

= 1.0 =
* initial release

== Installation ==

1. install and activate the plugin on the Plugins page
2. add shortcodes to pages or posts: `[bloginfo show="name"]`, `[site_name]`, `[site_desc]`, `[date format="Y-m-d"]`, `[time]`, `[year plus="3"]`, `[month minus="2"]`, `[month_name]`