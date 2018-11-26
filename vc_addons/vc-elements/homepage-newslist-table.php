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
                        'heading' => __('显示数量', 'suf-lang'), // 标题
                        'param_name' => 'param', //传参变量
                        'value' => 5, // 数值
                        'description' => __('显示多少个新闻内容的设定', 'suf-lang'), //说明
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => __('默认选项', 'suf-lang'), // 组标签
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __('分类选择', 'suf-lang'),
                        'param_name' => 'categorys',
                        'admin_label' => true,
                        'value' => $this->return_catelist('category'),
                        'std' => 'two', // 默认选项
                        'description' => __('选择您的新闻分类', 'suf-lang'),
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
    public function vc_newslist_table_html($atts)
    {

        global $post;
        $css = '';

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'param' => '6',
                    'css' => '',
                ),
                $atts
            )
        );
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $this->settings['base'], $atts);
        $cate_block = $atts['categorys'];
        $cate_postnum = $param;
        $cargs = array(
            'post_type' => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $cate_block
                )
            ),
            'posts_per_page' => intval($cate_postnum)
        );
        $thenewslist = new WP_Query($cargs);
        ob_start();
        ?>

        <div class="<?php echo esc_attr($css_class); ?>">
            <div class="row">
                <div class="vc_newslist vc_newslist-block col-md-12">
                    <div class="row">
                        <?php if ($thenewslist->have_posts()) : while ($thenewslist->have_posts()) :$thenewslist->the_post(); ?>
                            <div class="col-md-12 vc_newslist-section">
                                <div class="col-md-12">
                                    <div class="row">
                                        <dl class="table newsitem">
                                            <dd class="time"><?php the_time('Y-m-d'); ?></dd>
                                            <dt class="title"><a
                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </dt>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        wp_reset_postdata();
        return ob_get_clean();

    }

    private function return_catelist($cat)
    {
        $args = array(
            'taxonomy' => $cat, //'seller_cat',
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
new suf_Homepage_NewsList_Table();