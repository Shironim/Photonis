<?php
function img ($url,$title,$caption,$id,$class) { ?>
    <img src="<?php echo $url; ?>" data-caption="<?php echo $caption;?>" title="<?php echo $title; ?>" alt="<?php echo $title; ?>" id="<?php echo $id; ?>" class="<?php echo $class; ?>" />
<?php
}
function clear_html ($url) {
    $url = strip_tags($url);
    $url = addslashes($url);
    return $url;
}
function xss_clean($string){
    return filter_var($string, FILTER_SANITIZE_STRING);
}
?>
