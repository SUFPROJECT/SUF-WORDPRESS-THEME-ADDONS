<?php
/**
 * Created by PhpStorm.
 * User: Ryan
 * Date: 2018/11/23
 * Time: 17:31
 */

if (!function_exists('vc_before_init_actions')) {

    add_action('vc_before_init', 'vc_before_init_actions');

    // Before VC Init
    function vc_before_init_actions()
    {
        // 加入一个首页新闻列表
        require_once(__DIR__ . '/vc-elements/homepage-newslist-table.php');

    }
}
