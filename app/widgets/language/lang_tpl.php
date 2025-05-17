<select id="languages" tabindex="4" class="dropdown">
	<option value="" class="label"><?= $this->language['title'] ?></option>
    <?php foreach($this->languages as $k => $v): ?>
        <?php if($this->language['code'] != $k) : ?>
            <option value="<?= $k ?>" data-langcode="<?= $k ?>"><?= $v['title'] ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
	
</select>