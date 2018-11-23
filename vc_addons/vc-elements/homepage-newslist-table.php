<?php
/*
Element Description: VC Info Box
*/

// Element Class
class suf_Homepage_NewsList_Table extends WPBakeryShortCode
{

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_newslist_table_mapping'));
        add_shortcode('suf_Homepage_NewsList_Table', array($this, 'vc_newslist_table_html'));
    }

    // Element Mapping
    public function vc_newslist_table_mapping()
    {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }
        // Map the block with vc_map()
        vc_map(
            array(
                'name' => __('SUF:基础新闻列表', 'suf-lang'),//VC元件名称
                'base' => 'suf_Homepage_NewsList_Table', //对应shortcode
                'description' => __('SUF的极简模式新闻列表', 'suf-lang'), //远见说明
                'category' => __('3UWEB-SUFPROJECT', 'suf-lang'), //VC元件标签设置
                'icon' => __SUFURI__ . '/assets/img/vc-icon.png',
                'params' => array(

                    array(
                        'type' => 'textfield', //表单类型
                        'holder' => 'div', //包裹
                        'class' => 'field-class', // 使用class名
                        'heading' => __('Field name', 'suf-lang'), // 标题
                        'param_name' => 'param', //传参变量
                        'value' => __('Field name', 'suf-lang'), // 数值
                        'description' => __('Field name', 'suf-lang'), //说明
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => __('默认选项', 'suf-lang'), // 组标签
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __('Animation Style', 'text-domain'),
                        'param_name' => 'animation',
                        'description' => __('Choose your animation style', 'text-domain'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => __('默认选项', 'suf-lang'),
                    ),

                ),
            )
        );


    }


    // Element HTML
    public function vc_newslist_table_html($atts)
    {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'param' => '',
                ),
                $atts
            )
        );

        ob_start();
        ?>

        <div><?php echo $param; ?></div>

        <?php
        return ob_get_clean();

    }

} // End Element Class

// Element Class Init
new suf_Homepage_NewsList_Table();