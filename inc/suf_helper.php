<?php

if (!function_exists('do_saveaction_after')) {
    function do_saveaction_after($data)
    {
        if ($data['post_type'] == 'page') {
            $postcontent = $data['post_content'];
            $patterns = "/\[[\/]?vc_[^\]]*\]/";
            $replacements = "";
            $ex = preg_replace($patterns, $replacements, $postcontent);
            $postexcerpt = $ex;
            $postexcerpt = str_replace(PHP_EOL, '', $postexcerpt);
            $postexcerpt = str_replace(array("/r/n", "/r", "/n"), "", $postexcerpt);
            if (90 < mb_strlen($postexcerpt)) {
                // 90文字でトリム
                $postexcerpt = mb_substr($postexcerpt, 0, 90);
                //  ... を追加
                $postexcerpt .= '...';

            }
            $data['post_excerpt'] = $postexcerpt;
        }
        return $data;
    }


    // add_action('save_post', 'do_saveaction_after');
}