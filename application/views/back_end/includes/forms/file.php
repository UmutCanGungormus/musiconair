<form class="form-edit-text">
	<h5>Eleman Düzenle</h5>
	<table width="100%">
		<tr>
			<td height="35" width="150">
				Eleman Türü
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				Dosya Yükleyici
			</td>
		</tr>
		<tr>
			<td height="35" width="150">
				Eleman ID
			</td>
			<td height="35" width="10">:</td>
			<td height="35">
				<span class="element-name"><?php echo $properties['random_name']; ?></span>
				<input type="hidden" name="element_file_random_name" class="element_file_random_name" value="<?php echo $properties['random_name']; ?>">
				<input type="hidden" name="element_type" class="element_type" value="file">
			</td>
		</tr>
		<tr>
			<td height="35">
				Eleman Adı
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_file_name" name="element_file_name" value="<?php echo $properties['name']; ?>">
			</td>
		</tr>
		<tr>
			<td height="35">
				Yüklenebilir Dosya Boyutu
			</td>
			<td height="35">:</td>
			<td height="35">
				<input type="text" class="span12 element_file_max_file_size" name="element_file_max_file_size" value="<?php echo $properties['max_file_size']; ?>">
			</td>
		</tr>
		<tr>
			<td height="35">
				Yüklenebilir Dosya Türleri
			</td>
			<td height="35">:</td>
			<td height="35">
				<?php
					foreach ($properties['extension_type'] as $key => $value)
					{
						if ($value == 1)
							echo '<input type="checkbox" name="element_file_extension_type[]" class="element_file_extension_type" value="'.$key.'" checked> '.$key.'&nbsp;&nbsp;&nbsp;';
						else
							echo '<input type="checkbox" name="element_file_extension_type[]" class="element_file_extension_type" value="'.$key.'"> '.$key.'&nbsp;&nbsp;&nbsp;';
					}
				?>
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
					echo '<input type="radio" name="element_file_require" class="element_file_require" value="required" id="1" checked><label style="display: inline-block; font-size: 13px;" for="1">Zorunlu</label> ';
					echo '<input type="radio" name="element_file_require" class="element_file_require" value="" id="0"><label style="display: inline-block; font-size: 13px;" for="0">Zorunlu Değil</label>';
				else:
					echo '<input type="radio" name="element_file_require" class="element_file_require" value="required" id="1"><label style="display: inline-block; font-size: 13px;" for="1">Zorunlu</label> ';
					echo '<input type="radio" name="element_file_require" class="element_file_require" value="" id="0" checked><label style="display: inline-block; font-size: 13px;" for="0">Zorunlu Değil</label>';
				endif;
			?>
			</td>
		</tr>
		<tr>
			<td height="35">
			</td>
			<td height="35"></td>
			<td height="35" align="right">
				<button class="btn btn-info element-edit-file" data-url="<?php echo base_url('yonetici/form-yonetimi/eleman-duzenle'); ?>">Değişiklikleri Kaydet</button>
			</td>
		</tr>
	</table>
</form>