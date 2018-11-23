<?php
/*
Element Description: VC Info Box
*/

// Element Class
class vcInfoBox extends WPBakeryShortCode
{

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_infobox_mapping'));
        add_shortcode('vc_infobox', array($this, 'vc_infobox_html'));
    }

    // Element Mapping
    public function vc_infobox_mapping()
    {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
            array(
                'name' => __('Custom element item', 'text-domain'),
                'base' => 'custom_element_item_base',
                'description' => __('Custom element item', 'text-domain'),
                'category' => __('Custom element', 'text-domain'),
                'icon' => get_template_directory_uri() . '/assets/img/vc-icon.png',
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


                ),
            )
        );


    }


    // Element HTML
    public function vc_infobox_html($atts)
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
new vcInfoBox();