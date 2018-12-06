<?php
/*
Element Description: VC Info Box
*/
if (!class_exists('SUF_Company_outline')) {

// Element Class
    class SUF_Company_outline extends WPBakeryShortCode
    {
        // Element Init
        function __construct()
        {
            add_action('init', array($this, 'suf_Company_outline_map'));
            add_shortcode('suf_Company_outline', array($this, 'suf_Company_outline_html'));
            add_action('wp_enqueue_scripts', array($this, 'suf_custom_styles'), 1);
        }

        // Element Mapping
        public function suf_Company_outline_map()
        {
            // Stop all if VC is not enabled
            if (!defined('WPB_VC_VERSION')) {
                return;
            }
            // Map the block with vc_map()
            vc_map(
                array(
                    'name' => __('SUF:会社概要', 'suf-lang'),//VC元件名称
                    'base' => 'suf_Company_outline', //对应shortcode
                    'description' => __('SUF的会社概要排列', 'suf-lang'), //远见说明
                    'category' => __('3UWEB-SUFPROJECT', 'suf-lang'), //VC元件标签设置
                    'icon' => __SUFURI__ . '/assets/img/vc-icon.png',
                    'params' => array(
                        array(
                            'type' => 'textfield', //表单类型
                            'holder' => 'div', //包裹
                            'heading' => __('CLASS名', 'suf-lang'), // 标题
                            'param_name' => 'classname', //传参变量
                            'value' => '', // 数值
                            'description' => __('此组建的自定义class名称', 'suf-lang'), //说明
                            'admin_label' => false,
                            'weight' => 0,
                            'group' => __('默认选项', 'suf-lang'), // 组标签
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => __('样式选择', 'suf-lang'),
                            'param_name' => 'changestyle',
                            'admin_label' => true,
                            'value' => array(
                                'NONE STYLE' => '',
                                'TABLE STYLE' => 'table-style',
                                'LINE STYLE' => 'line-style',
                            ),
                            'std' => '', // 默认选项
                            'description' => __('选择您的新闻分类', 'suf-lang'),
                            'group' => __('默认选项', 'suf-lang'),
                        ),
                        // params group
                        array(
                            'type' => 'param_group',
                            'value' => '',
                            'param_name' => 'company_outlines',
                            // Note params is mapped inside param-group:
                            'params' => array(
                                array(
                                    'type' => 'textfield',
                                    'value' => '',
                                    'heading' => __('标题', 'suf-lang'),
                                    'param_name' => 'comp_title',
                                ),
                                array(
                                    'type' => 'textarea',
                                    'value' => '',
                                    'heading' => __('内容', 'suf-lang'),
                                    'param_name' => 'comp_content',
                                )
                            ),
                            'group' => __('默认选项', 'suf-lang'),
                        ),
                        array(
                            'type' => 'css_editor',
                            'heading' => __('Css', 'my-text-domain'),
                            'param_name' => 'css',
                            'group' => __('样式设定', 'suf-lang'),
                        ),

                    ),
                )
            );


        }


        // Element HTML
        public function suf_Company_outline_html($atts)
        {

            global $post;
            // Params extraction
            extract(
                shortcode_atts(
                    array(
                        'classname' => '',
                        'changestyle' => '',
                    ),
                    $atts
                )
            );
            $comp_outlines = vc_param_group_parse_atts($atts['company_outlines']);
            wp_enqueue_style('suf-cssgroup-compout');
            ob_start();
            ?>
            <div class="<?php echo esc_attr($classname); ?>">
                <dl class="suf-company_outlines_list <?php echo esc_attr($changestyle); ?>">
                    <?php
                    foreach ($comp_outlines as $comp_columns) {
                        echo '<dt class="suf-compout_title">' . $comp_columns['comp_title'] . '</dt>';
                        echo $comp_columns['comp_content'] != null || $comp_columns['comp_content'] != '' ? '<dd class="suf-compout_value">' . nl2br($comp_columns['comp_content']) . '</dd>' : '<dd class="suf-compout_value">&nbsp;</dd>';
                    }
                    ?>
                </dl>
            </div>

            <?php
            wp_reset_postdata();
            return ob_get_clean();

        }

        function suf_custom_styles()
        {

            /*Enqueue The Styles*/
            wp_enqueue_style('suf-cssgroup-compout', __SUFURI__ . '/assets/css/company-outlines.css', false, SUF_ADDONS_VERSION, 'screen, print');
        }

    } // End Element Class

// Element Class Init
    new SUF_Company_outline();


}