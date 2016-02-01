<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for admin area. */
/* ----------------------------------------------------------------------------------- */

$options = array(
    'tabs' => array(
        array(
            'name' => __('General', 'tfuse'),
            'type' => 'tab',
            'id' => TF_THEME_PREFIX . '_general',
            'headings' => array(
                array(
                    'name' => __('General Settings', 'tfuse'),
                    'options' => array(/* 1 */
                        // Custom Logo Option
                        array(
                            'name' => __('Custom Logo', 'tfuse'),
                            'desc' => __('Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_logo',
                            'value' => '',
                            'type' => 'upload'
                        ),
                        // Custom Favicon Option
                        array(
                            'name' => __('Custom Favicon <br /> (16px x 16px)', 'tfuse'),
                            'desc' => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_favicon',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        // Adress Box Text
                        array(
                            'name' => __('Header Contact Info', 'tfuse'),
                            'desc' => __('This contact info appears on the right side in the header of the theme', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_header_text_box',
                            'value' => '',
                            'type' => 'textarea',
                            'divider' => true
                        ),
                        // Search Box Text
                        array(
                            'name' => __('Search Box text', 'tfuse'),
                            'desc' => __('Enter your Search Box text', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_search_box_text',
                            'value' => 'Type for search',
                            'type' => 'text',
                            'divider' => true
                        ),
                        // Tracking Code Option
                        array(
                            'name' => __('Tracking Code', 'tfuse'),
                            'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_google_analytics',
                            'value' => '',
                            'type' => 'textarea',
                            'divider' => true
                        ),
                        // Custom CSS Option
                        array(
                            'name' => __('Custom CSS', 'tfuse'),
                            'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_custom_css',
                            'value' => '',
                            'type' => 'textarea'
                        )
                    ) /* E1 */
                ),
                array(
                    'name' => __('Appoiments', 'tfuse'),
                    'options' => array(
                        // Reserved Days
                        array('name' => __('Reserved Days', 'tfuse'),
                            'desc' => __('Enter Reserved Days in dd-mm-yy fomrat, comma separated e.g. 2011-12-31, 2012-1-1', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_reserved_days',
                            'value' => '',
                            'type' => 'textarea'
                        )
                    )
                ),
                array(
                    'name' => __('RSS', 'tfuse'),
                    'options' => array(
                        // RSS URL Option
                        array('name' => __('RSS URL', 'tfuse'),
                            'desc' => __('Enter your preferred RSS URL. (Feedburner or other)', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_feedburner_url',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true
                        ),
                        // E-Mail URL Option
                        array('name' => __('E-Mail URL', 'tfuse'),
                            'desc' => __('Enter your preferred E-mail subscription URL. (Feedburner or other)', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_feedburner_id',
                            'value' => '',
                            'type' => 'text'
                        )
                    )
                ),
                array(
                    'name' => __('Twitter', 'tfuse'),
                    'options' => array(
                        array(
                            'name' => __('Consumer Key', 'tfuse'),
                            'desc' => __('Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a> application <a href="http://screencast.com/t/yb44HiF2NZ">consumer key</a>.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_twitter_consumer_key',
                            'value' => 'XW7t8bECoR6ogYtUDNdjiQ',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array(
                            'name' => __('Consumer Secret', 'tfuse'),
                            'desc' => __('Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a> application <a href="http://screencast.com/t/eaKJHG1omN">consumer secret key</a>.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_twitter_consumer_secret',
                            'value' => 'Z7UzuWU8a4obyOOlIguuI4a5JV4ryTIPKZ3POIAcJ9M',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array(
                            'name' => __('User Token', 'tfuse'),
                            'desc' => __('Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a> application <a href="http://screencast.com/t/QEEG2O4H">access token key</a>.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_twitter_user_token',
                            'value' => '1510587853-ugw6uUuNdNMdGGDn7DR4ZY4IcarhstIbq8wdDud',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array(
                            'name' => __('User Secret', 'tfuse'),
                            'desc' => __('Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a>  application <a href="http://screencast.com/t/Yv7nwRGsz">access token secret key</a>.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_twitter_user_secret',
                            'value' => '7aNcpOUGtdKKeT1L72i3tfdHJWeKsBVODv26l9C0Cc',
                            'type' => 'text'
                        )
                    )
                ),
                array(
                    'name' => __('Copyright', 'tfuse'),
                    'options' => array(
                        //copyright
                        array('name' => __('Custom Copyright', 'tfuse'),
                            'desc' => __('Create your custom copyright', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_custom_copyright',
                            'value' => 'Made by Themefuse -<a href="http://themefuse.com"> Premium WordPress Themes</a>',
                            'type' =>'textarea'
                        )
                    )
                ),
                array(
                    'name' => __('Disable Theme settings', 'tfuse'),
                    'options' => array(
                        // Disable Image for All Single Posts
                        array('name' => __('Image on Single Post', 'tfuse'),
                            'desc' => __('Disable Image on All Single Posts? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_image',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Video for All Single Posts
                        array('name' => __('Video on Single Post', 'tfuse'),
                            'desc' => __('Disable Video on All Single Posts? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_video',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Comments for All Posts
                        array('name' => __('Post Comments', 'tfuse'),
                            'desc' => __('Disable Comments for All Posts? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_posts_comments',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Comments for All Pages
                        array('name' => __('Page Comments', 'tfuse'),
                            'desc' => __('Disable Comments for All Pages? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_pages_comments',
                            'value' => 'true',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Author Info
                        array('name' => __('Author Info', 'tfuse'),
                            'desc' => __('Disable Author Info? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_author_info',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Post Meta
                        array('name' => __('Post meta', 'tfuse'),
                            'desc' => __('Disable Post meta? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_post_meta',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Post Published Date
                        array('name' => __('Post Published Date', 'tfuse'),
                            'desc' => __('Disable Post Published Date? These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_published_date',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable posts lightbox (prettyPhoto) Option
                        array('name' => 'prettyPhoto on Categories',
                            'desc' => __('Disable opening image and attachemnts in prettyPhoto on Categories listings? If YES, image link go to post.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_listing_lightbox',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable posts lightbox (prettyPhoto) Option
                        array('name' => 'prettyPhoto on Single Post',
                            'desc' => __('Disable opening image and attachemnts in prettyPhoto on Single Post?', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_single_lightbox',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable SEO
                        array('name' => __('SEO Tab', 'tfuse'),
                            'desc' => __('Disable SEO option?', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_tfuse_seo_tab',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'on_update' => 'reload_page',
                            'divider' => true
                        ),
                        // Enable Dynamic Image Resizer Option
                        array('name' => __('Dynamic Image Resizer', 'tfuse'),
                            'desc' => __('This will Disable the thumb.php script that dynamicaly resizes images on your site. We recommend you keep this enabled, however note that for this to work you need to have "GD Library" installed on your server. This should be done by your hosting server administrator.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_disable_resize',
                            'value' => 'false',
                            'type' => 'checkbox'
                        ),
						 array('name' => __('Image from content', 'tfuse'),
                            'desc' => __('If no thumbnail is specified then the first uploaded image in the post is used.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_enable_content_img',
                            'value' => 'false',
                            'type' => 'checkbox'
                        ),
                        // Remove wordpress versions for security reasons
                        array(
                            'name' => __('Remove Wordpress Versions', 'tfuse'),
                            'desc' => __('Remove Wordpress versions from the source code, for security reasons.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_remove_wp_versions',
                            'value' => FALSE,
                            'type' => 'checkbox'
                        )
                    )
                ),
                array(
                    'name' => __('WordPress Admin Style', 'tfuse'),
                    'options' => array(
                        // Disable Themefuse Style
                        array('name' => __('Disable Themefuse Style', 'tfuse'),
                            'desc' => __('Disable Themefuse Style', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_deactivate_tfuse_style',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'on_update' => 'reload_page'
                        )
                    )
                )
            )
        ),
        array(
            'name' => __('Homepage', 'tfuse'),
            'id' => TF_THEME_PREFIX . '_homepage',
            'headings' => array(
                array(
                    'name' => __('Homepage Population', 'tfuse'),
                    'options' => array(
                        array('name' => __('Homepage Population', 'tfuse'),
                            'desc' => ' Select which categories to display on homepage. More over you can choose to load a specific page or change the number of posts on the homepage from <a target="_blank" href="' . network_admin_url('options-reading.php') . '">here</a>',
                            'id' => TF_THEME_PREFIX . '_homepage_category',
                            'value' => '',
                            'options' => array('all' => __('From All Categories','tfuse'), 'specific' => __('From Specific Categories','tfuse'),'page' =>__('From Specific Page', 'tfuse')),
                            'type' => 'select',
                            'install' => 'cat'
                        ),
                        array(
                            'name' => __('Select specific categories to display on homepage', 'tfuse'),
                            'desc' => __('Pick one or more
                            categories by starting to type the category name.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_categories_select_categ',
                            'type' => 'multi',
                            'subtype' => 'category',
                        ),
                        // page on homepage
                        array('name' => __('Select Page', 'tfuse'),
                            'desc' => __('Select the page', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_home_page',
                            'value' => 'image',
                            'options' => tfuse_list_page_options(),
                            'type' => 'select',
                        ),
                        array('name' => __('Use page options', 'tfuse'),
                            'desc' => __('Use page options', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_use_page_options',
                            'value' => 'false',
                            'type' => 'checkbox'
                        )
                    )
                ),
                array(
                    'name' => __('Homepage Header', 'tfuse'),
                    'options' => array(
                        /// Element of Hedear
                        array('name' => __('Element of Hedear', 'tfuse'),
                            'desc' => __('Select type of element on the header.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_header_element',
                            'value' => 'image',
                            'options' => array('none' => __('Without Header Element', 'tfuse'), 'slider' => __('Slider on Header', 'tfuse'), 'image' => __('Image on Header', 'tfuse')),
                            'type' => 'select',
                        ),
                        // Select Slider
                        $this->ext->slider->model->has_sliders() ?
                            array(
                                'name' => __('Slider', 'tfuse'),
                                'desc' => __('Select a slider for your post. The sliders are created on the', 'tfuse') . '<a href="' . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blank">' . __('Sliders page', 'tfuse') . '</a>.',
                                'id' => TF_THEME_PREFIX . '_select_slider',
                                'value' => '',
                                'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
                                'type' => 'select'
                            ) :
                            array(
                                'name' => __('Slider', 'tfuse'),
                                'desc' => '',
                                'id' => TF_THEME_PREFIX . '_select_slider',
                                'value' => '',
                                'html' => __('No sliders created yet. You can start creating one', 'tfuse') . '<a href="' . admin_url('admin.php?page=tf_slider_list') . '">' . __('here', 'tfuse') . '</a>.',
                                'type' => 'raw'
                            ),
                        // Header Image
                        array('name' => __('Header Image', 'tfuse'),
                            'desc' => __('Upload an image for your header. It will be resized to 960x142 px', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_header_image',
                            'value' => '',
                            'type' => 'upload',
                        )
                    )
                ),
                array(
                    'name' => __('Homepage Shortcodes', 'tfuse'),
                    'options' => array(
                        // Bottom Shortcodes
                        array('name' => __('Shortcodes after Content', 'tfuse'),
                            'desc' => __('In this textarea you can input your prefered custom shotcodes.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_content_bottom',
                            'value' => '',
                            'type' => 'textarea'
                        )
                    )
                )
            )
        ),
        array(
            'name' => __('Blog', 'tfuse'),
            'id' => TF_THEME_PREFIX . '_blogpage',
            'headings' => array(
                array(
                    'name' => __('Blog Page Population', 'tfuse'),
                    'options' => array(
                        // Select the Blog Page
                        array('name' => __('Select Blog Page', 'tfuse'),
                            'desc' => __('Select the blog page', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_blog_page',
                            'value' => 'image',
                            'options' => tfuse_list_page_options(),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array('name' => __('Blog Page Population', 'tfuse'),
                            'desc' => ' Select which categories to display on blog page. More over you can choose to load a specific page or change the number of posts on the homepage from <a target="_blank" href="' . network_admin_url('options-reading.php') . '">here</a>',
                            'id' => TF_THEME_PREFIX . '_blogpage_category',
                            'value' => '',
                            'options' => array('all' => __('From All Categories','tfuse'), 'specific' => __('From Specific Categories','tfuse')),
                            'type' => 'select',
                            'install' => 'cat'
                        ),
                        array(
                            'name' => __('Select specific categories to display on homepage', 'tfuse'),
                            'desc' => __('Pick one or more
                            categories by starting to type the category name.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_categories_select_categ_blog',
                            'type' => 'multi',
                            'subtype' => 'category',
                        )
                    )
                ),
                array(
                    'name' => __('Blog Page Header', 'tfuse'),
                    'options' => array(
                        /// Element of Hedear
                        array('name' => __('Element of Hedear', 'tfuse'),
                            'desc' => __('Select type of element on the header.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_header_element_blog',
                            'value' => 'image',
                            'options' => array('none' => __('Without Header Element', 'tfuse'), 'slider' => __('Slider on Header', 'tfuse'), 'image' => __('Image on Header', 'tfuse')),
                            'type' => 'select',
                        ),
                        // Select Slider
                        $this->ext->slider->model->has_sliders() ?
                            array(
                                'name' => __('Slider', 'tfuse'),
                                'desc' => __('Select a slider for your post. The sliders are created on the', 'tfuse') . '<a href="' . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blank">' . __('Sliders page', 'tfuse') . '</a>.',
                                'id' => TF_THEME_PREFIX . '_select_slider_blog',
                                'value' => '',
                                'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
                                'type' => 'select'
                            ) :
                            array(
                                'name' => __('Slider', 'tfuse'),
                                'desc' => '',
                                'id' => TF_THEME_PREFIX . '_select_slider_blog',
                                'value' => '',
                                'html' => __('No sliders created yet. You can start creating one', 'tfuse') . '<a href="' . admin_url('admin.php?page=tf_slider_list') . '">' . __('here', 'tfuse') . '</a>.',
                                'type' => 'raw'
                            ),
                        // Header Image
                        array('name' => __('Header Image', 'tfuse'),
                            'desc' => __('Upload an image for your header. It will be resized to 960x142 px', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_header_image_blog',
                            'value' => '',
                            'type' => 'upload',
                        )
                    )
                )
            )
        ),
        array(
            'name' => __('Posts', 'tfuse'),
            'id' => TF_THEME_PREFIX . '_posts',
            'headings' => array(
                array(
                    'name' => __('Default Post Options', 'tfuse'),
                    'options' => array(
                        // Post Content
                        array('name' => __('Post Content', 'tfuse'),
                            'desc' => __('Select if you want to show the full content (use <em>more</em> tag) or the excerpt on posts listings (categories).', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_post_content',
                            'value' => 'excerpt',
                            'options' => array('excerpt' => __('The Excerpt', 'tfuse'), 'content' => __('Full Content', 'tfuse')),
                            'type' => 'select',
                            'divider' => true
                        ),
                        // Single Image Position
                        array('name' => __('Image Position', 'tfuse'),
                            'desc' => __('Select your preferred image alignment', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_single_image_position',
                            'value' => 'alignleft',
                            'type' => 'images',
                            'options' => array('alignleft' => array($url . 'left_off.png', __('Align to the left', 'tfuse')), 'alignright' => array($url . 'right_off.png', __('Align to the right', 'tfuse')))
                        ),
                        // Single Image Dimensions
                        array('name' => __('Image Resize (px)', 'tfuse'),
                            'desc' => __('These are the default width and height values. If you want to resize the image change the values with your own. If you input only one, the image will get resized with constrained proportions based on the one you specified.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_single_image_dimensions',
                            'value' => array(612, 252),
                            'type' => 'textarray',
                            'divider' => true
                        ),
                        // Thumbnail Posts Position
                        array('name' => __('Thumbnail Position', 'tfuse'),
                            'desc' => __('Select your preferred thumbnail alignment', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_thumbnail_position',
                            'value' => 'alignleft',
                            'type' => 'images',
                            'options' => array('alignleft' => array($url . 'left_off.png', __('Align to the left', 'tfuse')), 'alignright' => array($url . 'right_off.png', __('Align to the right', 'tfuse')))
                        ),
                        // Posts Thumbnail Dimensions
                        array('name' => __('Thumbnail Resize (px)', 'tfuse'),
                            'desc' => __('These are the default width and height values. If you want to resize the thumbnail change the values with your own. If you input only one, the thumbnail will get resized with constrained proportions based on the one you specified.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_thumbnail_dimensions',
                            'value' => array(580, 349),
                            'type' => 'textarray',
                            'divider' => true
                        ),
                        // Video Position
                        array('name' => __('Video Position', 'tfuse'),
                            'desc' => __('Select your preferred video alignment', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_video_position',
                            'value' => 'alignleft',
                            'type' => 'images',
                            'options' => array('alignleft' => array($url . 'left_off.png', __('Align to the left', 'tfuse')), 'alignright' => array($url . 'right_off.png', __('Align to the right', 'tfuse')))
                        ),
                        // Video Dimensions
                        array('name' => __('Video Resize (px)', 'tfuse'),
                            'desc' => __('These are the default width and height values. If you want to resize the video change the values with your own. If you input only one, the video will get resized with constrained proportions based on the one you specified.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_video_dimensions',
                            'value' => array(580, 349),
                            'type' => 'textarray'
                        )
                    )
                )
            )
        ),
        array(
            'name' => __('Header', 'tfuse'),
            'id' => TF_THEME_PREFIX . '_feader',
            'headings' => array(
                array(
                    'name' => __('Default Header Images', 'tfuse'),
                    'options' => array(
                        array('name' => __('Pages', 'tfuse'),
                            'desc' => __('Default header image for pages. These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_page_header_image',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        array('name' => __('Posts', 'tfuse'),
                            'desc' => __('Default header image for posts. These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_post_header_image',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        array('name' => __('Categories', 'tfuse'),
                            'desc' => __('Default header image for categories. These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_category_header_image',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        array('name' => __('Doctors', 'tfuse'),
                            'desc' => __('Default header image for doctors. These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_doctor_header_image',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        array('name' => __('Specialties', 'tfuse'),
                            'desc' => __('Default header image for specialties. These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_specialty_header_image',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        array('name' => __('Services', 'tfuse'),
                            'desc' => __('Default header image for services. These settings may be overridden for individual articles.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_service_header_image',
                            'value' => '',
                            'type' => 'upload'
                        )
                    )
                )
            )
        ),
        array(
            'name' => __('Footer', 'tfuse'),
            'id' => TF_THEME_PREFIX . '_footer',
            'headings' => array(
                array(
                    'name' => __('Footer Content', 'tfuse'),
                    'options' => array(
                        // Enable Footer Shortcodes
                        array('name' => __('Enable Footer Shortcodes', 'tfuse'),
                            'desc' => __('This will enable footer shortcodes.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_enable_footer_shortcodes',
                            'value' => '',
                            'type' => 'checkbox'
                        ),
                        // Footer Shortcodes
                        array('name' => __('Footer Shortcodes', 'tfuse'),
                            'desc' => __('In this textarea you can input your prefered custom shotcodes.', 'tfuse'),
                            'id' => TF_THEME_PREFIX . '_footer_shortcodes',
                            'value' => '',
                            'type' => 'textarea'
                        )
                    )
                )
            )
        )
    )
);

?>