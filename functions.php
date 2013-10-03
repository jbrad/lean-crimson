<?php

/*
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ INSTRUCTIONS /\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\

	The following functions in Standard 3 are able to be overridden in your child 
	theme.
	
		standard_page_menu
		standard_add_theme_background
		standard_add_theme_editor_style
		standard_add_theme_menus
		standard_add_theme_sidebars
		standard_add_theme_features
		standard_set_media_embed_size
		standard_set_theme_colors
		standard_header_style
		standard_admin_header_style
		standard_admin_header_image
		standard_process_link_post_format_content
		standard_process_link_post_format_title
		standard_remove_paragraph_on_media
		standard_wrap_embeds
		standard_search_form
		standard_post_format_rss
		standard_modify_widget_titles
		standard_add_title_to_single_post_pagination

	You may also place any functions outlined in our FAQs & tutorials on the support
	forum in this file, as instructed, or any other code you create yourself or find
	from around the web.
	
	Be forewarned that even the simplest mistake within this file can completely
	bring down your website. Please make sure to create backups and have FTP
	access to your server before modifying this file so you amy correct any issues.
	
	Be sure to place any code after these instructions and before the closing 
	PHP tag (ie. "?>").

/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\
*/

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ CUSTOMIZATIONS /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

function add_additional_theme_menus() {
	
	register_nav_menus(
		array(
			'category_menu'		=> __( 'Category Menu', 'standard' )
		)
	);
	
} // end add_additional_theme_menus
	
add_action( 'init', 'add_additional_theme_menus' );

function get_category_navigation() {
	
	if( has_nav_menu( 'category_menu' ) ) { ?>
        <nav id="menu-below-header" class="menu-navigation navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu-category">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse menu-category">
                    <?php
                    wp_nav_menu(
                        array(
                            'container_class'	=> 'menu-header-container',
                            'theme_location'  	=> 'category_menu',
                            'items_wrap'      	=> '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
                            'fallback_cb'	  	=> null,
                            'walker'			=> new Bootstrap_Nav_Walker()
                        )
                    );
                    ?>

                    <?php if( ! has_nav_menu( 'menu_above_logo' ) ) { ?>
                        <?php get_template_part( 'social-networking' ); ?>
                    <?php } // end if ?>

                </div><!-- /.nav-collapse -->

            </div><!-- /.container -->
            </div><!-- ./navbar-inner -->
        </nav> <!-- /#menu-category -->
	<?php } // end if
	
} // end get_category_navigation

?>