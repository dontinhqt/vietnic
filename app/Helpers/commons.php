<?php
if (!function_exists('menuMutil')) {
    function menuMutil($data, $parent_id = 0, $str = ' --|')
    {
        foreach ($data as $val) {
            $id = $val['id'];
            $name = $val['name'];
            if ($val['parent_id'] == $parent_id) {
                echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
                menuMutil($data, $id, $str .= " --|");
            }
        }
    }
}

if (!function_exists('categorySelect')) {
    function categorySelect($data, $parent_id = 0, $text = " ", $select = 0)
    {
        foreach ($data as $k => $value) {
            if ($value['parent_id'] == $parent_id) {
                $id = $value['id'];
                $name = $value['name'];
                if ($select != 0 && $id == $select) {
                    echo "<option value='$id' selected='selected'>" . $text . $name . "</option>";
                } else {
                    echo "<option value='$id'>" . $text . $name . "</option>";
                }
                unset($data[$k]);
                categorySelect($data, $id, $text ." |-- ", $select);
            }
        }
    }
}