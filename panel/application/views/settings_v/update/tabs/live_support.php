<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<div class="tab-pane fade" id="live-support" role="tabpanel" aria-labelledby="live-support-tab">
	<div class="row">
		<div class="form-group col-md-12">
			<label>Canlı Destek (Script kodlarını editörün "Code View (< / >)" bölümünden ekleyiniz!)</label>
			<textarea name="live_support" class="m-0 tinymce" data-options="{height: 250}"><?= isset($form_error) ? set_value("live_support") : $item->live_support; ?></textarea>
		</div>
	</div>
</div>