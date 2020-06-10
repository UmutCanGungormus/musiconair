<form class="form-edit-text">
	<h5>Eleman Düzenle</h5>
	<table width="100%">
		<tr>
			<td height="35" width="150">
				Eleman Türü
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				Açılı Menü
			</td>
		</tr>
		<tr>
			<td height="35" width="150">
				Eleman ID
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				<span class="element-name"><?php echo $properties['random_name']; ?></span>
				<input type="hidden" name="element_select_random_name" class="element_select_random_name" value="<?php echo $properties['random_name']; ?>">
				<input type="hidden" name="element_type" class="element_type" value="select">
			</td>
		</tr>
		<tr>
			<td height="35">
				Eleman Adı
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_select_name" name="element_select_name" value="<?php echo $properties['name']; ?>">
			</td>
		</tr>
		<tr>
			<td height="35">
				Seçenekler<br>
				<span style="font-size: 10px; font-weight: bold;">(Seçenekleri virgül ile ayırın)</span>
			</td>
			<td height="35">:</td>
			<td height="35">
				<textarea name="element_select_options" class="span12 element_select_options"><?php echo trim($properties['options']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td height="35">
				Zorunlu
			</td>
			<td height="35">:</td>
			<td height="35">
			<?php
				if ($properties['required']):
					echo '<input type="radio" name="element_select_required" class="element_select_required" value="required" id="1" checked><label style="display: inline-block; font-size: 13px;" for="1">Zorunlu</label> ';
					echo '<input type="radio" name="element_select_required" class="element_select_required" value="" id="0"><label style="display: inline-block; font-size: 13px;" for="0">Zorunlu Değil</label>';
				else:
					echo '<input type="radio" name="element_select_required" class="element_select_required" value="required" id="1"><label style="display: inline-block; font-size: 13px;" for="1">Zorunlu</label> ';
					echo '<input type="radio" name="element_select_required" class="element_select_required" value="" id="0" checked><label style="display: inline-block; font-size: 13px;" for="0">Zorunlu Değil</label>';
				endif;
			?>
			</td>
		</tr>
		<tr>
			<td height="35">
			</td>
			<td height="35"></td>
			<td height="35" align="right">
				<button class="btn btn-info element-edit-select" data-url="<?php echo base_url('yonetici/form-yonetimi/eleman-duzenle'); ?>">Değişiklikleri Kaydet</button>
			</td>
		</tr>
	</table>
</form>