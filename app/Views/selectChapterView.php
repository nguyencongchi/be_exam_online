<label for="selec_adv_1">Chương</label>
<select id="selec_adv_1" name="selec_adv_1[]" multiple>
    <?php foreach ($chapters as $item) { ?>
        <option value="<?php echo $item['id']; ?>"
                selected><?php echo $item['name_chapter']; ?></option>
    <?php } ?>
</select>
<script>
    new MultiSelectTag('selec_adv_1')  // id
</script>