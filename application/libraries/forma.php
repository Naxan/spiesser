<?php
class FormA extends Laravel\Form {
    public static function textarea_ck($name, $value = '', $attributes = array()) {
        $attributes['id'] = $name;
        $html = self::textarea($name, $value, $attributes);
        $html .= "<script>CKEDITOR.replace('{$name}');</script>";
        return $html;
    }
}
?>