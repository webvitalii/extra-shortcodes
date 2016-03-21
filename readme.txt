=== Extra Shortcodes ===
Contributors: webvitaly
Donate link: http://web-profile.com.ua/donate/
Tags: shortcode, shortcodes, archives, archive, category, categories, tag, tags, taxonomy, taxonomies, bloginfo, date, date_i18n, time, year, month, week, day
Requires at least: 3.0
Tested up to: 5.0
Stable tag: 2.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

[extra_archives], [extra_taxonomies], [bloginfo show="name"], [date format="l jS \\of F Y"], [date_i18n], [time]

== Description ==
> **[Speedup WordPress](http://codecanyon.net/item/silver-bullet-pro/15171769?ref=webvitalii "Speedup and protect WordPress in a smart way")** |
> **[Extra Shortcodes](http://web-profile.com.ua/wordpress/plugins/extra-shortcodes/ "Extra Shortcodes")** |
> **[Donate](http://web-profile.com.ua/donate/ "Donate")** |
> **[GitHub](https://github.com/webvitalii/extra-shortcodes "Fork")**


= Shortcodes: =
* `[extra_archives]` - list of monthly archives links sorted by date;
* `[extra_archives type="yearly"]` - list of yearly archives links;
* `[extra_archives type="monthly"]` - list of monthly archives links;
* `[extra_archives type="weekly"]` - list of weekly archives links;
* `[extra_archives type="daily"]` - list of daily archives links;
* `[extra_archives type="postbypost"]` - list of all posts links sorted by date;
* `[extra_archives type="alpha"]` -  list of all posts links sorted by title;
* `[extra_taxonomies]` - list of categories, tags or any other taxonomies;
* `[bloginfo show="name"]` - [bloginfo params](http://codex.wordpress.org/Function_Reference/get_bloginfo);
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

**[more info about shortcodes](http://wordpress.org/plugins/extra-shortcodes/other_notes/ "Extra Shortcodes")**

= Useful: =
* **[Silver Bullet Pro - Speedup and protect WordPress in a smart way](http://codecanyon.net/item/silver-bullet-pro/15171769?ref=webvitalii "Speedup and protect WordPress in a smart way")**
* **[Anti-spam Pro - Block spam in comments](http://codecanyon.net/item/antispam-pro/6491169?ref=webvitalii "Block spam in comments")**


== Other Notes ==

= Parameters for [extra_archives]: =
* `[extra_archives]` - list of monthly archives links sorted by date;
* `[extra_archives type="yearly"]` - list of yearly archives links;
* `[extra_archives type="monthly"]` - list of monthly archives links;
* `[extra_archives type="weekly"]` - list of weekly archives links;
* `[extra_archives type="daily"]` - list of daily archives links;
* `[extra_archives type="postbypost"]` - list of all posts links sorted by date;
* `[extra_archives type="alpha"]` -  list of all posts links sorted by title;
* **limit** - how many links to be included in the list: `[extra_archives limit="10"]`; by default all links are shown: `[extra_archives limit=""]`;
* **show_post_count** - display counter of posts in the archive: `[extra_archives show_post_count="1"]`; by default counter is not shown: `[extra_archives show_post_count="0"]`;
* **order** - how to sort archives links: `[extra_archives order="ASC"]`; by default links are sorted by descending order (Z-A): `[extra_archives order="DESC"]`;

[extra_archives] is based on [wp_get_archives function](https://codex.wordpress.org/Function_Reference/wp_get_archives).


= Parameters for [extra_taxonomies]: =
* **orderby** - sort list by specific field: `[extra_taxonomies order="count"]`; by default list is sorted by name: `[extra_taxonomies order="name"]`; possible values: ID, name, slug, count, term_group;
* **order** - the sort order of the list of pages (either ascending or descending): `[extra_taxonomies order="DESC"]`; by default: `[extra_taxonomies order="ASC"]`; possible values: ASC, DESC;
* **show_count** - display counter of posts in the list: `[extra_taxonomies show_count="1"]`; by default counter is not shown: `[extra_taxonomies show_count="0"]`;* **limit** - how many links to be included in the list: `[extra_archives limit="10"]`; by default all links are shown: `[extra_archives limit=""]`;
* **hide_empty** - show or hide empty categories or taxonomies: `[extra_taxonomies hide_empty="0"]`; by default empty categories are hidden: `[extra_taxonomies hide_empty="1"]`;
* **use_desc_for_title** - use description for title: `[extra_taxonomies use_desc_for_title="0"]`; by default the description is used as link title: `[extra_taxonomies use_desc_for_title="1"]`;
* **child_of** - only display categories that are children of the category identified by this parameter: `[extra_taxonomies child_of="77"]`;
* **exclude** - exclude one or more categories (comma-separated list of category ids) from the results: `[extra_taxonomies exclude="5,7,9"]`;
* **exclude_tree** - exclude category-tree (comma-separated list of category ids) from the results: `[extra_taxonomies exclude_tree="5,7,9"]`; The parameter include must be empty. If the hierarchical parameter is true, then use exclude instead of exclude_tree.
* **include** - only include the categories detailed in a comma-separated list by category id: `[extra_taxonomies include="5,7,9"]`;
* **hierarchical** - list is hierarchical (tree-like) or flat: `[extra_taxonomies hierarchical="0"]`; by default the list is hierarchical: `[extra_taxonomies hierarchical="1"]`;
* **number** - sets the number of categories to display: `[extra_taxonomies number="10"]`; by default the number is unlimited: `[extra_taxonomies number=""]`;
* **depth** - how many levels in the hierarchy of pages are to be included in the list: `[extra_taxonomies depth="3"]`; by default the depth is unlimited: `[extra_taxonomies depth="0"]`;
* **taxonomy** - show list of registered taxonomy: `[extra_taxonomies taxonomy="post_tag"]`; by default shows the list of categories: `[extra_taxonomies taxonomy="category"]`;

[extra_taxonomies] is based on [wp_list_categories function](https://codex.wordpress.org/Template_Tags/wp_list_categories).


= Parameters for [bloginfo]: =
* `[bloginfo show="name"]` - [bloginfo params](http://codex.wordpress.org/Function_Reference/get_bloginfo);
* `[site_name]` - Name of the site;
* `[site_desc]` - Description of the site;
* `[site_url]` - http://site.url;
* `[wp_version]` - 4.5 (WordPress version);

`[bloginfo]` is based on [bloginfo function](https://codex.wordpress.org/Function_Reference/bloginfo).


= Parameters for [date]: =

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


== Changelog ==

= 2.2 - 2016-01-11 =
* added [extra_taxonomies] shortcode
* updated readme.txt

= 2.1 - 2015-12-25 =
* added [extra_archives] shortcode
* updated readme.txt

= 2.0 - 2015-12-21 =
* code refactoring
* shortcodes cleanup

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