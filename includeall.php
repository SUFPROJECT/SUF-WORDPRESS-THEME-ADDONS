<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 2018/11/23
 * Time: 17:25
 */
/**
 *
 * 将suf目录复制到模板根目录，并使用下面语句加入到模板的function.php文件中去。
 * include_once ( get_template_directory() . '/suf/includeall.php' );
 *
 */

$masterfolder = explode('/', dirname(__FILE__));

define(SUF_ADDONS_VERSION, '1.0');
define(__SUFPATH__, __DIR__);
define(__SUFURI__, get_template_directory_uri() . '/' . $masterfolder[count($masterfolder) - 1]);


if (!function_exists('include_suf_files')) {
    function include_suf_files()
    {
        include_once(__DIR__ . '/vc_addons/vc_addons.php');
        include_once(__DIR__ . '/inc/suf_helper.php');
    }

    include_suf_files();
}


/**
 * 过滤器
 */

//add_filter('wp_insert_post_data', 'do_saveaction_after', '99', 1);
