<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="tab-pane fade" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
	<div class="row">
		<div class="form-group col-md-12">
			<label>Hakkımızda</label>
			<textarea name="about_us" class="m-0 tinymce"  data-options="{height: 250}">
				<?= isset($form_error) ? set_value("about_us") : $item->about_us; ?>
			</textarea>
		</div>
	</div>
</div>