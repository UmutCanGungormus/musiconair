<form class="form-edit-text">
	<h5>Eleman Düzenle</h5>
	<table width="100%">
		<tr>
			<td height="35" width="150">
				Eleman Türü
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				Çoklu Onay Kutusu
			</td>
		</tr>
		<tr>
			<td height="35" width="150">
				Eleman ID
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				<span class="element-name"><?php echo $properties['random_name']; ?></span>
				<input type="hidden" name="element_checkbox_random_name" class="element_checkbox_random_name" value="<?php echo $properties['random_name']; ?>">
				<input type="hidden" name="element_type" class="element_type" value="checkbox">
			</td>
		</tr>
		<tr>
			<td height="35">
				Eleman Adı
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_checkbox_name" name="element_checkbox_name" value="<?php echo $properties['name']; ?>">
			</td>
		</tr>
		<tr>
			<td height="35">
				Seçenekler<br>
				<span style="font-size: 10px; font-weight: bold;">(Seçenekleri virgül ile ayırın)</span>
			</td>
			<td height="35">:</td>
			<td height="35">
				<textarea class="span12 element_checkbox_options" name="element_checkbox_options"><?php echo trim($properties['options']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td height="35">
			</td>
			<td height="35"></td>
			<td height="35" align="right">
				<button class="btn btn-info element-edit-checkbox" data-url="<?php echo base_url('yonetici/form-yonetimi/eleman-duzenle'); ?>">Değişiklikleri Kaydet</button>
			</td>
		</tr>
	</table>
</form>