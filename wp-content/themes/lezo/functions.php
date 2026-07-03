<?php
/**
 * LEZO Finance - functions.php
 * Điểm khởi động của theme: nạp các module trong thư mục inc/.
 *
 * @package Lezo
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LEZO_VERSION', '1.0.0' );
define( 'LEZO_DIR', get_template_directory() );
define( 'LEZO_URI', get_template_directory_uri() );

require_once LEZO_DIR . '/inc/setup.php';       // theme supports, menus, sidebar
require_once LEZO_DIR . '/inc/enqueue.php';     // CSS/JS
require_once LEZO_DIR . '/inc/post-types.php';  // CPT: slide, advisor, case
require_once LEZO_DIR . '/inc/template-tags.php';// helper hiển thị
require_once LEZO_DIR . '/inc/customizer.php';  // Customizer (top bar, footer, social...)
require_once LEZO_DIR . '/inc/acf-fields.php';  // ACF field groups (nếu ACF bật)
require_once LEZO_DIR . '/inc/extras.php';      // excerpt, a11y, comments, pagination, breadcrumb
