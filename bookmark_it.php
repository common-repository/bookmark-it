<?php
/**
Plugin Name: Bookmark It
Plugin URI: http://techofweb.com/plugins/share-articles-8-important-bookmarking-sites-bookmark.html
Description: Wordpress Plugin that allows your visitors to share your posts to 8 most required Social Bookmarking sites
			 i.e. Google Buzz, Twitter, Stumbleupon, Facebook, Digg, Delicious, Reddit, Technorati

Version: 0.2
Author: Atul Kumar
Author URI: http://www.techofweb.com
Stable Tag: trunk
License: A "Slug" license name e.g. GPL2


  Copyright 2010 Atul Kumar (email : oceanofweb@gmail.com) (Blog: http://techofweb.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


INSTRUCTIONS
------------
1. Download the plugin from http://www.techofweb.com/wp-downloads/bookmark-it.zip
2. Extract and upload the contents of the archive to 'yourserver.com/wp-content/plugins/bookmark-it/'
3. Login to your Wordpress admin panel and browse to the Plugins section.
4. Activate the Bookmark It Wordpress Plugin.

**/


	add_filter('the_content', 'bookmark_it_display');
	
		function bookmark_it_display($content='') {
			if (is_single())
			$content .= bookmark_it();
		  
			return $content;
		}

	function bookmark_it() {	
		global $wp_query;
		$post = $wp_query->post;
		$permalink = get_permalink($post->ID);
		$title = urlencode($post->post_title);
		$homelink = get_bloginfo('wpurl');

		$final_link ='<div><b><p>Bookmark It!!!</p></b>';

		$buzz_link = '<a href="http://www.google.com/reader/link?url='.$permalink.'&amp;title='.$title.'" title="Buzz It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/buzz_it.jpg" width="48" height="48" alt="Buzz It" border="0"></a>&nbsp;&nbsp;';

		$twitter_link = '<a href="http://twitthis.com/twit?url='.$permalink.'&amp;title='.$title.'" title="Twitt It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/twitt_it.jpg" width="48" height="48" alt="Twitt It" border="0"></a>&nbsp;&nbsp;';
		
		$stumbleupon_link = '<a href="http://www.stumbleupon.com/submit?url='.$permalink.'&amp;title='.$title.'" title="StumbleUpon It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/stumbleUpon_it.jpg" width="48" height="48" alt="StumbleUpon It" border="0"></a>&nbsp;&nbsp;';
		
		$facebook_link = '<a href="http://www.facebook.com/share.php?u='.$permalink.'&amp;title='.$title.'" title="Submit to Facebook" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/facebook_it.jpg" width="48" height="48" alt="Facebook It" border="0"></a>&nbsp;&nbsp;';

		$digg_link = '<a href="http://digg.com/submit?phase=2&URL='.$permalink.'&amp;title='.$title.'" title="Digg It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/digg_it.jpg" width="48" height="48" alt="Digg It" border="0"></a>&nbsp;&nbsp;';

		$delicious_link = '<a href="http://del.icio.us/post?url='.$permalink.'&amp;title='.$title.'" title="Delicious It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/delicious_it.jpg" width="48" height="48" alt="Delicious It" border="0"></a>&nbsp;&nbsp;';

		$reddit_link = '<a href="http://www.reddit.com/submit?url='.$permalink.'&amp;title='.$title.'" title="Reditt It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/reddit_it.jpg" width="48" height="48" alt="Reditt It" border="0"></a>&nbsp;&nbsp;';

		$technorati_link = '<a href="http://technorati.com/faves?add='.$permalink.'&amp;title='.$title.'" title="Technorati It" target="_blank" rel="nofollow"><img src="'.$homelink.'/wp-content/plugins/bookmark-it/images/technorati_it.jpg" width="48" height="48" alt="Reditt It" border="0"></a>&nbsp;&nbsp;';

		$final_link .= $buzz_link.$twitter_link.$stumbleupon_link.$facebook_link.$digg_link.$delicious_link.$reddit_link.$technorati_link;

		$final_link .= '</div>';

		return $final_link;
	}

?>
