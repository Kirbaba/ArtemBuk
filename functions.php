<?php

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR . '/lib/Parser.php';

function add_style(){
    wp_enqueue_style( 'my-bootstrap-extension', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1');
    wp_enqueue_style( 'font-ewesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'mcustomscrollbar', '//cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.min.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-styles', get_template_directory_uri() . '/css/style.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'my-sass', get_template_directory_uri() . '/sass/style.css', array('my-bootstrap-extension'), '1');
   // wp_enqueue_style( 'fotorama', get_template_directory_uri() . '/css/fotorama.css', array('my-bootstrap-extension'), '1');
    wp_enqueue_style( 'vegas', get_template_directory_uri() . '/css/vegas.min.css', array('my-bootstrap-extension'), '1');
}

function add_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    //wp_enqueue_script( 'jq', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1');
    wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox-plus-jquery.min.js', array(), '1', 1);
    wp_enqueue_script( 'gradienttext', get_template_directory_uri() . '/js/jquery.gradienttext.js', array(), '1', 1);
    wp_enqueue_script( 'measurer', get_template_directory_uri() . '/js/jquery.measurer.js', array(), '1', 1);
    wp_enqueue_script( 'mCustomScrollbar', '//cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js', array(), '1', 1);
    wp_enqueue_script( 'vegas-js', get_template_directory_uri() . '/js/vegas.min.js', array(), '1');
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    //wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');

}

function add_admin_script(){
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
    wp_enqueue_script('admin',get_template_directory_uri() . '/js/admin.js', array(), '1');
  //  wp_enqueue_style( 'my-bootstrap-extension-admin', get_template_directory_uri() . '/css/bootstrap.css', array(), '1');
  //  wp_enqueue_script( 'my-bootstrap-extension', get_template_directory_uri() . '/js/bootstrap.js', array(), '1');
    wp_enqueue_style( 'my-style-admin', get_template_directory_uri() . '/css/admin.css', array(), '1');
}

add_action('admin_enqueue_scripts', 'add_admin_script');
add_action( 'wp_enqueue_scripts', 'add_style' );
add_action( 'wp_enqueue_scripts', 'add_script' );

function prn($content) {
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r ( $content );
    echo '</pre>';
}

function my_pagenavi() {
    global $wp_query;

    $big = 999999999; // уникальное число для замены

    $args = array(
        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) )
    ,'format' => ''
    ,'current' => max( 1, get_query_var('paged') )
    ,'total' => $wp_query->max_num_pages
    );

    $result = paginate_links( $args );

    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}

function excerpt_readmore($more) {
    return '... <br><a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Читать далее' . '</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');


if ( function_exists( 'add_theme_support' ) )
    add_theme_support( 'post-thumbnails' );

/*--------------------------------------------- МЕНЮ НАВИГАЦИИ -------------------------------------------------------*/

function theme_register_nav_menu() {
    register_nav_menus( array(
        'primary' => 'Меню в шапке',

    ) );
    //register_nav_menu( 'primary', 'Главное меню' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );


/*-------------------------------------------- КОНЕЦ МЕНЮ НАВИГАЦИИ --------------------------------------------------*/

/*------------------------------------------------ НАСТРОЙКИ ТЕМЫ ----------------------------------------------------*/
add_action('customize_register', function($customizer){
    /*Меню настройки контактов*/
    $customizer->add_section(
        'contacts_section',
        array(
            'title' => 'Настройки контактов',
            'description' => 'Контакты',
            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'mail_textbox',
        array('default' => 'artembukworld@gmail.com')
    );

    $customizer->add_control(
        'mail_textbox',
        array(
            'label' => 'Почта',
            'section' => 'contacts_section',
            'type' => 'text',
        )
    );


    /*Меню настройки соцсетей*/
    $customizer->add_section(
        'social_section',
        array(
            'title' => 'Социальные сети',
            'description' => 'Соц. сети',
            'priority' => 35,
        )
    );

    $customizer->add_setting(
        'vk_textbox',
        array('default' => 'vk.com')
    );
    $customizer->add_setting(
        'fb_textbox',
        array('default' => 'fb.com')
    );
    $customizer->add_setting(
        'inst_textbox',
        array('default' => 'instagram.com')
    );
    $customizer->add_setting(
        'tw_textbox',
        array('default' => 'twitter.com')
    );
    $customizer->add_setting(
        'ok_textbox',
        array('default' => 'ok.ru')
    );

    $customizer->add_control(
        'vk_textbox',
        array(
            'label' => 'VK',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'fb_textbox',
        array(
            'label' => 'Facebook',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'inst_textbox',
        array(
            'label' => 'Instagram',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'tw_textbox',
        array(
            'label' => 'Twitter',
            'section' => 'social_section',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'ok_textbox',
        array(
            'label' => 'Одноклассники',
            'section' => 'social_section',
            'type' => 'text',
        )
    );


});
/*---------------------------------------------- КОНЕЦ НАСТРОЕК ТЕМЫ -------------------------------------------------*/

/*---------------------------------------- АВТОРИЗАЦИЯ И РЕГИСТРАЦИЯ -------------------------------------------------*/


/*------------------------------------- КОНЕЦ АВТОРИЗАЦИИ И РЕГИСТРАЦИИ ----------------------------------------------*/

/*-------------------------------------------- ШАБЛОНЫ КАТЕГОРИЙ -----------------------------------------------------*/

function inherit_template()
{
    if (is_category())
    {
        $catid = get_query_var('cat');
        $cat = &get_category($catid);
        $parent = $cat->category_parent;
        $cat = &get_category($parent);
        //prn($cat);
        if ($cat->slug == 'trips')
        {
            if (file_exists(TM_DIR . '/category-subtrips-template.php'))
            {
                include (TM_DIR . '/category-subtrips-template.php');
                exit;
            }
        }
    }
}

add_action('template_redirect', 'inherit_template', 1);

add_filter( 'single_template', function ( $single_template ) {

    $parent     = '3'; //Change to your category ID
    $categories = get_categories( 'child_of=' . $parent );
    $cat_names  = wp_list_pluck( $categories, 'name' );

    if ( has_category( 'read' ) || has_category( 'reviews' ) || has_category( 'jurisprudence' )  || has_category( $cat_names ) ) {
        $single_template = dirname( __FILE__ ) . '/single-read.php';
    }
    return $single_template;

}, PHP_INT_MAX, 2 );

/*----------------------------------------- КОНЕЦ ШАБЛОНОВ КАТЕГОРИЙ -------------------------------------------------*/

/*--------------------------------------------- БЛОКИ НА ГЛАВНОЙ -----------------------------------------------------*/

function my_attachments( $attachments )
{
    $fields         = array(
        array(
            'name'      => 'title',                         // unique field name
            'type'      => 'text',                          // registered field type
            'label'     => __( 'Title', 'attachments' ),    // label to display
            'default'   => 'title',                         // default value upon selection
        )
    );

    $args = array(

        // title of the meta box (string)
        'label'         => 'Прикрепленные изображения',

        // all post types to utilize (string|array)
        'post_type'     => array( 'mainpageblocks' ),

        // meta box position (string) (normal, side or advanced)
        'position'      => 'normal',

        // meta box priority (string) (high, default, low, core)
        'priority'      => 'high',

        // allowed file type(s) (array) (image|video|text|audio|application)
        'filetype'      => null,  // no filetype limit

        // include a note within the meta box (string)
        'note'          => 'прикрепите изображения здесь!',

        // by default new Attachments will be appended to the list
        // but you can have then prepend if you set this to false
        'append'        => true,

        // text for 'Attach' button in meta box (string)
        'button_text'   => __( 'Добавить изображения', 'attachments' ),

        // text for modal 'Attach' button (string)
        'modal_text'    => __( 'Добавить', 'attachments' ),

        // which tab should be the default in the modal (string) (browse|upload)
        'router'        => 'browse',

        // whether Attachments should set 'Uploaded to' (if not already set)
        'post_parent'   => false,

        // fields array
        'fields'        => $fields,

    );

    $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );

add_action('init', 'myCustomInitMainpageBlocks');

function myCustomInitMainpageBlocks()
{
    $labels = array(
        'name' => 'Блоки на главной', // Основное название типа записи
        'singular_name' => 'Блоки на главной', // отдельное название записи типа Book
        'add_new' => 'Добавить блок',
        'add_new_item' => 'Добавить новый блок',
        'edit_item' => 'Редактировать блок',
        'new_item' => 'Новый блок',
        'view_item' => 'Посмотреть блок',
        'search_items' => 'Найти блок',
        'not_found' => 'Блоков не найдено',
        'not_found_in_trash' => 'В корзине блоков не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Блоки на главной'

    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('mainpageblocks', $args);
}

/* Сохраняем данные, при сохранении поста */
add_action('save_post', 'myExtraFieldsUpdate', 10, 1);
function myExtraFieldsUpdate($post_id)
{
    if (!isset($_POST['extra'])) return false;
    foreach ($_POST['extra'] as $key => $value) {
        if (empty($value)) {
            delete_post_meta($post_id, $key); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

function extraFieldsBlockLink($post)
{
    ?>
    <p>
        <span>Ссылка: </span>
        <input type="text" name='extra[link]' value="<?php echo get_post_meta($post->ID, "link", 1); ?>">
    </p>
    <?php
}

function myExtraFieldsMainpageBlocks()
{
    add_meta_box('extra_link', 'Ссылка на категорию', 'extraFieldsBlockLink', 'mainpageblocks', 'normal', 'high');
}

add_action('add_meta_boxes', 'myExtraFieldsMainpageBlocks', 1);

function blocksShortcode()
{
    $args = array(
        'post_type' => 'mainpageblocks',
        'posts_per_page' => -1);

    $my_query = new WP_Query($args);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/mainpage-blocks.php', ['my_query' => $my_query]);
}

add_shortcode('blocks', 'blocksShortcode');

/*------------------------------------------ КОНЕЦ БЛОКОВ НА ГЛАВНОЙ -------------------------------------------------*/



