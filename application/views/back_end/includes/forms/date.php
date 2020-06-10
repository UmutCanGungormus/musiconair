<form class="form-edit-text">
	<h5>Eleman Düzenle</h5>
	<table width="100%">
		<tr>
			<td height="35" width="150">
				Eleman Türü
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				Tarih Seçici
			</td>
		</tr>
		<tr>
			<td height="35" width="150">
				Eleman ID
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				<span class="element-name"><?php echo $properties['random_name']; ?></span>
				<input type="hidden" name="element_date_random_name" class="element_date_random_name" value="<?php echo $properties['random_name']; ?>">
				<input type="hidden" name="element_type" class="element_type" value="date">
			</td>
		</tr>
		<tr>
			<td height="35">
				Eleman Adı
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_date_name" name="element_date_name" value="<?php echo $properties['name']; ?>">
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
					echo '<input type="radio" name="element_date_required" class="element_date_required" value="required" id="1" checked><label style="display: inline-block; font-size: 13px;" for="1">Zorunlu</label> ';
					echo '<input type="radio" name="element_date_required" class="element_date_required" value="" id="0"><label style="display: inline-block; font-size: 13px;" for="0">Zorunlu Değil</label>';
				else:
					echo '<input type="radio" name="element_date_required" class="element_date_required" value="required" id="1"><label style="display: inline-block; font-size: 13px;" for="1">Zorunlu</label> ';
					echo '<input type="radio" name="element_date_required" class="element_date_required" value="" id="0" checked><label style="display: inline-block; font-size: 13px;" for="0">Zorunlu Değil</label>';
				endif;
			?>
			</td>
		</tr>
		<tr>
			<td height="35">
			</td>
			<td height="35"></td>
			<td height="35" align="right">
				<button class="btn btn-info element-edit-date" data-url="<?php echo base_url('yonetici/form-yonetimi/eleman-duzenle'); ?>">Değişiklikleri Kaydet</button>
			</td>
		</tr>
	</table>
</form>