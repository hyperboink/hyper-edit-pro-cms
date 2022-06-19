<?=form_open('form/send', 'class="form form-'. $form_id .'" enctype="multipart/form-data"')?>

	<?php if(isset($data) && count($data)):?>

		<h3><?=$name?></h3>

		<input type="hidden" name="form_id" value="<?=$form_id?>">

		<?php foreach($data as $key => $field):?>

			<?php if($field['type'] == 'text'):?>
				<div class="input-con input-con-textbox">
					<?php if(!$label_hidden && $field['label']):?>
						<label for="<?=$field['name']?>"><?=$field['label']?><?=$field['required'] ? '<span class="required">*</span>' : ''?></label>
					<?php endif?>

					<input type="<?=$field['customType'] == 'email' ? $field['customType'] : 'text'?>" name="<?=$field['name']?>__<?=$field['labelConcatenated']?>" id="<?=$field['name']?>" class="input-element<?=$field['customType'] == 'number' ? ' number' : ''?><?=$field['customType'] == 'date' ? ' date-picker' : ''?><?=$field['customType'] == 'time' ? ' time-picker' : ''?><?=$field['customType'] == 'date-time' ? ' date-time-picker' : ''?>" <?=$field['required'] ? 'required' : ''?> placeholder="<?=!$placeholder_hidden ? '' . $field['placeholder'] . ($field['required'] ? '*' : '') : ''?>">
				</div>
			<?php endif?>

			<?php if($field['type'] == 'textarea'):?>
				<div class="input-con input-con-textarea">
					<?php if(!$label_hidden && $field['label']):?>
						<label for="<?=$field['name']?>"><?=$field['label']?><?=$field['required'] ? '<span class="required">*</span>' : ''?></label>
					<?php endif?>

					<textarea class="<?=$field['name']?>" name="<?=$field['name']?>__<?=$field['labelConcatenated']?>" id="<?=$field['name']?>" class="input-element" <?=$field['required'] ? 'required' : ''?> placeholder="<?=!$placeholder_hidden ? '' . $field['placeholder'] . ($field['required'] ? '*' : '') : ''?>"  rows="7"></textarea>
				</div>
			<?php endif?>

			<?php if($field['type'] == 'select_basic'):?>
				<div class="input-con input-con-select">
					<?php if(!$label_hidden && $field['label']):?>
						<label><?=$field['label']?><?=$field['required'] ? '<span class="required">*</span>' : ''?></label>
					<?php endif?>

					<select name="<?=$field['name']?>__<?=$field['labelConcatenated']?>" id="<?=$field['name']?>" class="input-element">
						<?php foreach($field['options'] as $key => $option):?>
							<option value="<?=$option['value']?>" <?=!$key? 'selected="selected"': ''?>><?=$option['text']?></option>
						<?php endforeach?>
					</select>
				</div>
			<?php endif?>

			<?php if($field['type'] == 'checkbox'):?>
				<div class="input-con input-con-checkbox">
					<?php if(!$label_hidden && $field['label']):?>
						<label><?=$field['label']?><?=$field['required'] ? '<span class="required">*</span>' : ''?></label>
					<?php endif?>

					<?php foreach($field['options'] as $key => $option):?>
						<div class="<?=$field['type']?>">
							<label>
								<input type="checkbox" name="<?=$field['name'].'_'.$key?>__<?=$field['labelConcatenated']?>" id="<?=$field['name'].'_'.$key?>" class="input-element" <?=$field['required'] ? 'required' : ''?>  value="<?=$option['value']?>">
								<span><?=$option['text']?></span>
							</label>
						</div>
					<?php endforeach?>
				</div>
			<?php endif?>

			<?php if($field['type'] == 'radio'):?>
				<div class="input-con input-con-radio">
					<?php if(!$label_hidden && $field['label']):?>
						<label><?=$field['label']?><?=$field['required'] ? '<span class="required">*</span>' : ''?></label>
					<?php endif?>

					<?php foreach($field['options'] as $key => $option):?>
						<div class="<?=$field['type']?>">
							<label>
								<input type="radio" name="<?=$field['name']?>__<?=$field['labelConcatenated']?>" id="<?=$field['name'].'_'.$key?>" class="input-element" value="<?=$option['value']?>" <?=!$key? 'checked': ''?>>
								<span><?=$option['text']?></span>
							</label>
						</div>
					<?php endforeach?>
				</div>
			<?php endif?>

			<?php if($field['type'] == 'file'):?>
				<div class="input-con input-con-file">
					<?php if(!$label_hidden && $field['label']):?>
						<label for="<?=$field['name']?>"><?=$field['label']?></label>
					<?php endif?>

					<input type="file" name="<?=$field['name']?>__<?=$field['labelConcatenated']?>" id="<?=$field['name']?>" class="input-element">
				</div>
			<?php endif?>

			<?php if($field['type'] == 'static_text'):?>
				<div class="input-con input-con-text">
					<?php if(!$label_hidden && $field['label']):?>
						<label><?=$field['label']?></label>
					<?php endif?>

					<div class="form-content">
						<p><?=$field['value']?></p>
					</div>
				</div>
			<?php endif?>

		<?php endforeach?>

		<div class="input-con input-con-submit">
			<input type="submit" name="submit" value="<?=$button_text ?: 'Send'?>">
		</div>

	<?php endif?>

</form>