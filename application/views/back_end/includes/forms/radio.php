<form class="form-edit-text">
	<h5>Eleman Düzenle</h5>
	<table width="100%">
		<tr>
			<td height="35" width="150">
				Eleman Türü
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				Tekli Onay Kutusu
			</td>
		</tr>
		<tr>
			<td height="35" width="150">
				Eleman ID
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				<span class="element-name"><?php echo $properties['random_name']; ?></span>
				<input type="hidden" name="element_radio_random_name" class="element_radio_random_name" value="<?php echo $properties['random_name']; ?>">
				<input type="hidden" name="element_type" class="element_type" value="radio">
			</td>
		</tr>
		<tr>
			<td height="35">
				Eleman Adı
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_radio_name" name="element_radio_name" value="<?php echo $properties['name']; ?>" required>
			</td>
		</tr>
		<tr>
			<td height="35">
				Seçenek 1<br>
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_radio_option_1" name="element_radio_option_1" value="<?php echo $properties['options_1']; ?>" required>
			</td>
		</tr>
		<tr>
			<td height="35">
				Seçenek 2
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_radio_option_2" name="element_radio_option_2" value="<?php echo $properties['options_2']; ?>" required>
			</td>
		</tr>
		<tr>
			<td height="35">
			</td>
			<td height="35"></td>
			<td height="35" align="right">
				<button class="btn btn-info element-edit-radio" data-url="<?php echo base_url('yonetici/form-yonetimi/eleman-duzenle'); ?>">Değişiklikleri Kaydet</button>
			</td>
		</tr>
	</table>
</form>