<select id="Content_type_name" name = "Content[idtype]">
    <option value="none">(Select a content type)</option>
    <?php
    foreach($data['opt'] as $k => $v) {
        $selected = (isset($data['sel']) && $data['sel'] == $v['idtype']) ? 'selected' : '';

        echo '<option value="'.$v['idtype'].'" '.$selected.'>'.$v['title'].'</option>';
    }
    ?>
</select>