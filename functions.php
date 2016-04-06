<?php

define('TM_DIR', get_template_directory(__FILE__));
define('TM_URL', get_template_directory_uri(__FILE__));

require_once TM_DIR . '/lib/Parser.php';
require_once TM_DIR . '/lib/Registration.php';

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
  //  wp_enqueue_script( 'measurer', get_template_directory_uri() . '/js/jquery.measurer.js', array(), '1', 1);
    wp_enqueue_script( 'mCustomScrollbar', '//cdn.jsdelivr.net/jquery.mcustomscrollbar/3.0.6/jquery.mCustomScrollbar.concat.min.js', array(), '1', 1);
    wp_enqueue_script( 'vegas-js', get_template_directory_uri() . '/js/vegas.min.js', array(), '1');
   // wp_enqueue_script( 'gradient-js', get_template_directory_uri() . '/js/pxgradient-1.0.3.js', array(), '1');
    wp_enqueue_script( 'cookie-js', get_template_directory_uri() . '/js/js.cookie.js', array(), '1');
    wp_enqueue_script( 'bookmark-js', get_template_directory_uri() . '/js/bookmark.js', array(), '1');
    wp_enqueue_script( 'illustration_grid', get_template_directory_uri() . '/js/illustration_grid.js', array(), '1', 1);
    wp_enqueue_script( 'gradient', get_template_directory_uri() . '/js/gradient.js', array(), '1', 1);

    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/script.js', array(), '1');
    //wp_enqueue_script( 'fotorama-js', get_template_directory_uri() . '/js/fotorama.js', array(), '1');
    wp_localize_script('my-script', 'myajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );

}

function add_admin_script(){
 //   wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '1');
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

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'posts_columns', 5);
    add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
    add_filter('manage_pages_columns', 'posts_columns', 5);
    add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
}
function posts_columns($defaults){
    $defaults['wps_post_thumbs'] = __('Thumbs');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
    if($column_name === 'wps_post_thumbs'){
        echo the_post_thumbnail( array(125,80) );
    }
}

function additional_mime_types( $mimes ) {
    $mimes['epub'] = 'application/epub+zip';
    $mimes['fb2'] = 'application/x-fb2';

    return $mimes;
}
add_filter( 'upload_mimes', 'additional_mime_types' );
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
// готова, файл Registration.php
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

    $parent     = '2'; //Change to your category ID
    $categories = get_categories( 'child_of=' . $parent );
    $cat_names  = wp_list_pluck( $categories, 'name' );

    if ( has_category( 'read' ) || has_category( 'reviews' ) || has_category( 'jurisprudence' )  || has_category( $cat_names ) ) {
        $single_template = dirname( __FILE__ ) . '/single-read.php';
    }

    return $single_template;

}, PHP_INT_MAX, 2 );

/*----------------------------------------- КОНЕЦ ШАБЛОНОВ КАТЕГОРИЙ -------------------------------------------------*/

/*--------------------------------------------- БЛОКИ НА ГЛАВНОЙ -----------------------------------------------------*/

/*function my_attachments( $attachments )
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

add_action( 'attachments_register', 'my_attachments' );*/

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
/*------------------------------------------------ ОТЗЫВЫ ------------------------------------------------------------*/

    function getReviews(){
        $args = array(
            'category_name' => 'reviews',
            'posts_per_page' => -1);

        $my_query = new WP_Query($args);

        $parser = new Parser();
        $parser->render(TM_DIR . '/views/reviews.php', ['my_query' => $my_query]);
    }

    add_shortcode('reviews','getReviews');

/*--------------------------------------------- КОНЕЦ ОТЗЫВОВ --------------------------------------------------------*/
/*--------------------------------------------- ПУТЕШЕСТВИЯ ----------------------------------------------------------*/

// AJAX ACTION
add_action('wp_ajax_aboutTrip', 'getTrip');
add_action('wp_ajax_nopriv_aboutTrip', 'getTrip');

function getTrip(){
    if($_POST){
        $post_id = $_POST['id'];
        $post = get_post($post_id);

        //thumbnail
        $html = '<div class="modal-content--img">
					<img src="'.wp_get_attachment_url( get_post_thumbnail_id($post_id) ).'" alt="" />
				</div>';
        //content
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $html .= '<p>'.$content.'</p>';
        echo $html;
    }
    die();
}

/*----------------------------------------- КОНЕЦ ПУТЕШЕСТВИЙ --------------------------------------------------------*/

/*--------------------------------------------- МАГАЗИН -----------------------------------------------------*/

/*function my_attachments( $attachments )
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

add_action( 'attachments_register', 'my_attachments' );*/

add_action('init', 'myCustomInitStore');

function myCustomInitStore()
{
    $labels = array(
        'name' => 'Магазин', // Основное название типа записи
        'singular_name' => 'Магазин', // отдельное название записи типа Book
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новый товар',
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'view_item' => 'Посмотреть товар',
        'search_items' => 'Найти товар',
        'not_found' => 'Товаров не найдено',
        'not_found_in_trash' => 'В корзине товаров не найдено',
        'parent_item_colon' => '',
        'menu_name' => 'Магазин'

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
        'supports' => array('title', 'thumbnail','editor','comments')
    );
    register_post_type('store', $args);
}

function extraFieldsStoreAuthor($post)
{
    ?>
    <p>
        <span>Автор: </span>
        <input type="text" name='extra[author]' value="<?php echo get_post_meta($post->ID, "author", 1); ?>">
    </p>
    <?php
}

function extraFieldsStorePrice($post)
{
    ?>
    <p>
        <span>Цена (только цифры): </span>
        <input type="text" name='extra[price]' value="<?php echo get_post_meta($post->ID, "price", 1); ?>">
    </p>
    <?php
}

/*сслки на 50% книги*/
function extraFieldsStoreLink50pdf($post)
{
    ?>
    <p>
        <span>Ссылка на 50% книги *.pdf: </span>
        <input type="text" name='extra[link50pdf]' value="<?php echo get_post_meta($post->ID, "link50pdf", 1); ?>">
    </p>
    <?php
}

function extraFieldsStoreLink50fb2($post)
{
    ?>
    <p>
        <span>Ссылка на 50% книги *.fb2: </span>
        <input type="text" name='extra[link50fb2]' value="<?php echo get_post_meta($post->ID, "link50fb2", 1); ?>">
    </p>
    <?php
}

function extraFieldsStoreLink50rtf($post)
{
    ?>
    <p>
        <span>Ссылка на 50% книги *.rtf: </span>
        <input type="text" name='extra[link50rtf]' value="<?php echo get_post_meta($post->ID, "link50rtf", 1); ?>">
    </p>
    <?php
}

function extraFieldsStoreLink50epub($post)
{
    ?>
    <p>
        <span>Ссылка на 50% книги *.epub: </span>
        <input type="text" name='extra[link50epub]' value="<?php echo get_post_meta($post->ID, "link50epub", 1); ?>">
    </p>
    <?php
}

function extraFieldsStoreLink50html($post)
{
    ?>
    <p>
        <span>Ссылка на 50% книги *.html: </span>
        <input type="text" name='extra[link50html]' value="<?php echo get_post_meta($post->ID, "link50html", 1); ?>">
    </p>
    <?php
}

function extraFieldsStoreLinkZip($post)
{
    ?>
    <p>
        <span>Ссылка на архив со всеми книгами: </span>
        <input type="text" name='extra[linkzip]' value="<?php echo get_post_meta($post->ID, "linkzip", 1); ?>">
    </p>
    <?php
}

/*ссылка на 1ю главу книги*/
function extraFieldsStoreLinkRead($post)
{
    ?>
    <p>
        <span>Ссылка на чтение: </span>
        <input type="text" name='extra[linkread]' value="<?php echo get_post_meta($post->ID, "linkread", 1); ?>">
    </p>
    <?php
}


function myExtraFieldsStore()
{
    add_meta_box('extra_author', 'Автор', 'extraFieldsStoreAuthor', 'store', 'normal', 'high');
    add_meta_box('extra_price', 'Цена', 'extraFieldsStorePrice', 'store', 'normal', 'high');
    add_meta_box('extra_link50pdf', 'Ссылка на 50% книги *.pdf', 'extraFieldsStoreLink50pdf', 'store', 'normal', 'high');
    add_meta_box('extra_link50fb2', 'Ссылка на 50% книги *.fb2', 'extraFieldsStoreLink50fb2', 'store', 'normal', 'high');
    add_meta_box('extra_link50rtf', 'Ссылка на 50% книги *.rtf', 'extraFieldsStoreLink50rtf', 'store', 'normal', 'high');
    add_meta_box('extra_link50epub', 'Ссылка на 50% книги *.epub', 'extraFieldsStoreLink50epub', 'store', 'normal', 'high');
    add_meta_box('extra_link50html', 'Ссылка на 50% книги *.html', 'extraFieldsStoreLink50html', 'store', 'normal', 'high');
    add_meta_box('extra_linkzip', 'Ссылка на архив со всеми доступными форматами полных книг', 'extraFieldsStoreLinkZip', 'store', 'normal', 'high');
    add_meta_box('extra_linkread', 'Ссылка чтение книги', 'extraFieldsStoreLinkRead', 'store', 'normal', 'high');
}

add_action('add_meta_boxes', 'myExtraFieldsStore', 1);


function getProducts(){
    $args = array(
        'post_type' => 'store',
        'posts_per_page' => -1);

    $my_query = new WP_Query($args);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/products.php', ['my_query' => $my_query]);
}

add_shortcode('products','getProducts');

function generateNumber($length = 5){
    $chars = '0123456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}

add_action( 'admin_post_add_order', 'admin_add_order' );
add_action( 'admin_post_nopriv_add_order', 'admin_add_order' );

function admin_add_order() {
    global $wpdb;

    $order_num = generateNumber();

    if($_POST['subscription-duration']){
        $month = $_POST['subscription-duration'];
        $price = $_POST['subscription-price'];
        //$end_date = strtotime('+'.$month.' month', time());
        $user = $_POST['subscription-user_id'];

        if(!get_user_meta($user,'subscription_duration')){
            add_user_meta( $user, 'subscription_duration', 0, true );
        }
        if(!get_user_meta($user,$order_num)){
            add_user_meta( $user,$order_num, 0, true );
        }else{
            update_user_meta( $user, $order_num, 0 );
        }

        $wpdb->insert('subscriptions',array(
            'order_num' => $order_num,
            'price' => $price,
            'status' => 0,
            'duration' => 0,
            'user_id' => $user,
            'type' => $month,
        ));

        // Handle request then generate response using echo or leaving PHP and using HTML
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ".get_bloginfo('url')."/order/?sum=".$price."&uid=".$user."&dur=".$month."&n=".$order_num);
        exit();
    }else{
        $current_user = wp_get_current_user();
        $product_id = $_POST['buybook--id'];
        $product_price = $_POST['buybook--sum'];
        $email = $_POST['buybook--mail'];

        if(
        $wpdb->insert('orders',array(
            'order_num' => $order_num,
            'book_id' => $product_id,
            'price' => $product_price,
            'email' => $email,
            'status' => 0,
            'user_id' => $current_user->ID,
        ))){
            // Handle request then generate response using echo or leaving PHP and using HTML
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".get_bloginfo('url')."/order/?sum=".$product_price."&n=".$order_num);
            exit();
        }
    }

}

function set_order_status($order,$shp_item){
    global $wpdb;

    if($shp_item == 1){
        $wpdb->update('orders',array(
            'status' => 1,
        ),array(
            'order_num' => $order,
        ));

        $order_data = $wpdb->get_results('SELECT * FROM `orders` WHERE order_num = '.$order,ARRAY_A);
        $book = get_post($order_data[0]['book_id']);

        send_book($order_data,$book);
    }else{
        $args = array(
            'meta_key'     => $order,
            'meta_value'   => 0,
        );
        $user = get_users( $args );

        //prn($user[0]->ID);
        $curr_dur = get_user_meta($user[0]->ID,'subscription_duration');

        if($curr_dur[0] == '0'){
            //set status to close
            //update duration value
            $new_dur = strtotime('+'.$shp_item.' month', time());
            update_user_meta( $user[0]->ID, 'subscription_duration', $new_dur);
            update_user_meta( $user[0]->ID, $order, 1);
            //print data
           // $neew = get_user_meta($user[0]->ID,'subscription_duration');
            //prn(date("m.d.y", $neew[0]));
        }else{
            //set status to close
            //update duration value
            $new_dur = strtotime('+'.$shp_item.' month', $curr_dur[0]);
            update_user_meta( $user[0]->ID, 'subscription_duration', $new_dur);
            update_user_meta( $user[0]->ID, $order, 1);
            //print data
            //$neew = get_user_meta($user[0]->ID,'subscription_duration');
           // prn(date("m.d.y", $neew[0]));
        }

        $wpdb->update('subscriptions',array(
            'status' => 1,
            'duration' => time(),
        ),array(
            'order_num' => $order,
        ));
    }
}

function send_book($order,$book){
    $book_link = get_post_meta($order[0]['book_id'],'linkzip',1);
    $mail = $order[0]['email'];

    $format = explode('.',$book_link);
    $last = $format[count($format)-1];

    $new_file = "wp-content/uploads/temp.".$last;

    if(copy($book_link,$new_file)){
        $data = open_attachment($new_file);
    }

    //$book_link = $_SERVER['DOCUMENT_ROOT'].'/wp-content/uploads/2016/02/614.jpg';
    $str = 'Ваш заказ: '.$book->post_title.' <br>';
    $str .= 'Ссылка на скачку: '.$book_link.' <br>';

    $name = "book.".$last; // в этой переменной надо сформировать имя файла (без всякого пути)
    $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
    $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.
    $headers    = "MIME-Version: 1.0;$EOL";
    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";
    $headers   .= "From: address@server.com";

    $multipart  = "--$boundary$EOL";
    $multipart .= "Content-Type: text/html; charset=UTF-8$EOL";
    $multipart .= "Content-Transfer-Encoding: base64$EOL";
    $multipart .= $EOL; // раздел между заголовками и телом html-части
    $multipart .= chunk_split(base64_encode($str));

    $multipart .=  "$EOL--$boundary$EOL";
    $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";
    $multipart .= "Content-Transfer-Encoding: base64$EOL";
    $multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";
    $multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла
    $multipart .= $data;

    $multipart .= "$EOL--$boundary--$EOL";

    unlink($new_file);
    if(!mail($mail, 'Письмо с сайта Артема Бука', $multipart, $headers))
    {
        return False;           //если не письмо не отправлено
    }
    else { //// если письмо отправлено
        return True;

    }
}

function open_attachment($new_file){

    $file = fopen($new_file,'r+');

    // Read the file content into a variable
    $flsz=filesize($new_file);
    //prn($flsz);
    $data = fread($file,$flsz);
    // close the file
    fclose($file);
    // Now we need to encode it and split it into acceptable length lines
    $data = chunk_split(base64_encode($data));

    return $data;
}
/*------------------------------------------ КОНЕЦ МАГАЗИНА -------------------------------------------------*/

/*------------------------------------------------------CABINET-------------------------------------------------------*/

function rus_date() {
// Перевод
    $translate = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "Понедельник",
        "Mon" => "Пн",
        "Tuesday" => "Вторник",
        "Tue" => "Вт",
        "Wednesday" => "Среда",
        "Wed" => "Ср",
        "Thursday" => "Четверг",
        "Thu" => "Чт",
        "Friday" => "Пятница",
        "Fri" => "Пт",
        "Saturday" => "Суббота",
        "Sat" => "Сб",
        "Sunday" => "Воскресенье",
        "Sun" => "Вс",
        "January" => "Января",
        "Jan" => "Янв",
        "February" => "Февраля",
        "Feb" => "Фев",
        "March" => "Марта",
        "Mar" => "Мар",
        "April" => "Апреля",
        "Apr" => "Апр",
        "May" => "Мая",
        "May" => "Мая",
        "June" => "Июня",
        "Jun" => "Июн",
        "July" => "Июля",
        "Jul" => "Июл",
        "August" => "Августа",
        "Aug" => "Авг",
        "September" => "Сентября",
        "Sep" => "Сен",
        "October" => "Октября",
        "Oct" => "Окт",
        "November" => "Ноября",
        "Nov" => "Ноя",
        "December" => "Декабря",
        "Dec" => "Дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое"
    );
    // если передали дату, то переводим ее
    if (func_num_args() > 1) {
        $timestamp = func_get_arg(1);
        return strtr(date(func_get_arg(0), $timestamp), $translate);
    } else {
// иначе текущую дату
        return strtr(date(func_get_arg(0)), $translate);
    }
}

//associating a function to login hook
add_action('wp_login', 'set_last_login');

//function for setting the last login
function set_last_login($login) {
    $user = get_userdatabylogin($login);

    //add or update the last login value for logged in user
    update_usermeta( $user->ID, 'last_login', current_time('mysql') );
}

//function for getting the last login
function get_last_login($user_id) {
    $last_login = get_user_meta($user_id, 'last_login', true);

    //picking up wordpress date time format
    $date_format = get_option('date_format') . ' ' . get_option('time_format');

    //converting the login time to wordpress format
    $the_last_login = mysql2date($date_format, $last_login, false);

    //finally return the value
    return $the_last_login;
}

function new_time($a) { // преобразовываем время в нормальный вид
   // date_default_timezone_set('Europe/Moscow');
    $ndate = date('d.m.Y', $a);
    $ndate_time = date('H:i', $a);
    $ndate_exp = explode('.', $ndate);
    $nmonth = array(
        1 => 'янв',
        2 => 'фев',
        3 => 'мар',
        4 => 'апр',
        5 => 'мая',
        6 => 'июн',
        7 => 'июл',
        8 => 'авг',
        9 => 'сен',
        10 => 'окт',
        11 => 'ноя',
        12 => 'дек'
    );

    foreach ($nmonth as $key => $value) {
        if($key == intval($ndate_exp[1])) $nmonth_name = $value;
    }

    if($ndate == date('d.m.Y')) return 'Сегодня в '.$ndate_time;
    elseif($ndate == date('d.m.Y', strtotime('-1 day'))) return 'Вчера в '.$ndate_time;
    else return $ndate_exp[0].' '.$nmonth_name.' '.$ndate_exp[2].' в '.$ndate_time;
}

function get_subscription_end($user_id){
    $duration = 'Не оплачено';
    if(get_user_meta($user_id,'subscription_duration')){
        $curr_dur = get_user_meta($user_id,'subscription_duration',1);
       // prn($curr_dur);
        $duration = 'Оплачено до: '.rus_date("j F Y", $curr_dur);
    }
    return $duration;
}

add_action( 'admin_post_update_user', 'update_user_info' );
add_action( 'admin_post_nopriv_update_user', 'update_user_info' );

function update_user_info(){
  //prn($_POST);
    if ( !empty( $_POST['nickname'] ) ) {
        wp_update_user( array ('ID' => $_POST['user_id'], 'display_name' => esc_attr( $_POST['nickname'] ) ) ) ;
        update_user_meta($_POST['user_id'], 'nickname', esc_attr( $_POST['nickname'] ) );
        update_user_meta($_POST['user_id'], 'display_name', esc_attr( $_POST['nickname'] ) );
    }

    if(!empty( $_POST['user_email'])){
        $email = $_POST['user_email'];

        $userdata = array(
            'ID' => $_POST['user_id,'],
            'user_email' => esc_attr($email)
        );
        if(!wp_update_user( $userdata )){
            echo "Возникла ошибка при редактировании почты.";
        }
    }
    if(!empty($_POST['gender'])){
        $gender = $_POST['gender'];
        update_user_meta($_POST['user_id'],'gender',$gender);
    }
    if(!empty($_POST['living_place'])){
        $living_place = $_POST['living_place'];

        update_user_meta($_POST['user_id'],'living_place',$living_place);
    }
    if(!empty($_POST['bday'])){
        $bday = $_POST['bday'];
        update_user_meta($_POST['user_id'],'bday',$bday);
    }
    if(!empty($_POST['new_password'])){
        $pass = $_POST['new_password'];
    }
    if(!empty($_POST['new_password_repeat'])){
        $pass_repeat = $_POST['new_password_repeat'];
    }

    if(!empty($_FILES['avatar'])){
        if (!function_exists('wp_handle_upload')) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' ); }
        $return = media_handle_upload('avatar', 0);

        if (is_int($return)) {
            echo "Файл успешно загружен. ID: $return";
            update_user_meta($_POST['user_id'],'wp_user_avatar',$return);
        } else {
            echo "Возникла ошибка при загрузке файла, повторите попытку";
        }
    }

    if($pass == $pass_repeat){
        $new_pass = $pass;

        update_user_meta($_POST['user_id,'], 'user_pass', $new_pass);
        wp_set_password($new_pass,$_POST['user_id']);
        wp_update_user( array ('ID' => $_POST['user_id,'], 'user_pass' => $new_pass) ) ;
    }

    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".get_bloginfo('url')."/cabinet");
    exit();
}

//orders
function get_user_orders($userid){
    global $wpdb;

    $orders = $wpdb->get_results("SELECT * FROM `orders` WHERE `user_id`= $userid",ARRAY_A);
    //prn($orders);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/orders.php', ['orders' => $orders]);
}

//subscriptions
function get_user_subscription($userid){
    global $wpdb;

    $subscriptions = $wpdb->get_results("SELECT * FROM `subscriptions` WHERE `user_id`= $userid",ARRAY_A);
   // prn($subscriptions);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/subscriptions.php', ['subscriptions' => $subscriptions]);
}

/*----------------------------------------------------END CABINET-----------------------------------------------------*/
/*---------------------------------------------------ADMIN PAGES------------------------------------------------------*/

function register_orders_page(){
    add_menu_page(
        'Заказы', 'Заказы', 'manage_options', 'orders', 'admin_orders_page', '', 190
    );
}

function admin_orders_page(){
    global $wpdb;


    if(isset($_GET['del'])){
        $wpdb->delete( 'orders', ['id'=>$_GET['del']] );
    }

    $orders = $wpdb->get_results("SELECT * FROM `orders`", ARRAY_A);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/orders_admin_page.php', ['orders' => $orders]);
}

add_action( 'admin_menu', 'register_orders_page' );


function admin_subscriptions_page(){
    global $wpdb;


    if(isset($_GET['del'])){
        $wpdb->delete( 'subscriptions', ['id'=>$_GET['del']] );
    }

    $subscriptions = $wpdb->get_results("SELECT * FROM `subscriptions`", ARRAY_A);

    $parser = new Parser();
    $parser->render(TM_DIR . '/views/subscriptions_admin_page.php', ['subscriptions' => $subscriptions]);
}

function register_subscriptions_page(){
    add_menu_page(
        'Подписки', 'Подписки', 'manage_options', 'subscriptions', 'admin_subscriptions_page', '', 191
    );
}
add_action( 'admin_menu', 'register_subscriptions_page' );
/*---------------------------------------------------END ADMIN PAGES--------------------------------------------------*/