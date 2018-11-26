<?php
/*
Element Description: VC Info Box
*/

// Element Class
class vcElement extends WPBakeryShortCode
{

    // Element Init
    function __construct()
    {
        add_action('init', array($this, 'vc_elements_mapping'));
        add_shortcode('vcElement', array($this, 'vc_elements_html'));
    }

    // Element Mapping
    public function vc_elements_mapping()
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
                        'heading' => __('显示数量', 'suf-lang'), // 标题
                        'param_name' => 'param', //传参变量
                        'value' => __('Field name', 'suf-lang'), // 数值
                        'description' => __('显示多少个新闻内容的设定', 'suf-lang'), //说明
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => __('默认选项', 'suf-lang'), // 组标签
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __('Foo', 'suf-lang'),
                        'param_name' => 'foo',
                        'admin_label' => true,
                        'value' => array(
                            'one' => 'First Option',
                            'two' => 'Second Option',
                            'three' => 'Third Option',
                            'four' => 'Fourth Option'
                        ),
                        'std' => 'two', // 默认选项
                        'description' => __('The description', 'suf-lang'),
                        'group' => __('默认选项', 'suf-lang'),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __('Css', 'my-text-domain'),
                        'param_name' => 'css',
                        'group' => __('默认选项', 'suf-lang'),
                    ),

                ),
            )
        );


    }


    // Element HTML
    public function vc_elements_html($atts)
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

    private function return_catelist($cat)
    {
        $args = array(
            'taxonomy' => $custom_cate, //'seller_cat',
            'parent' => 0, // get top level categories
            'orderby' => 'name',
            'order' => 'ASC',
            'hierarchical' => 1,
            'hide_empty' => false,
            'pad_counts' => 0,
        );
        $categories = get_categories($args);
        $list = array();
        foreach ($categories as $category) {
            $list[$category->name] = $category->term_id;
        }
        return $list;
    }

} // End Element Class

// Element Class Init
new vcElement();