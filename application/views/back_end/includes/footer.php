    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12">
            &copy; 2019 powered by
            <a style="font-weight: bold;" href="http://www.mutfakyapim.com">Mutfak Yapım</a>
        </div>
        <!-- footer -->
    </div>
     <!--end-Footer-part-->

     <div class="loader"></div>
     
    <script src="<?php echo base_url('public/back_end/'); ?>js/jquery.min.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/jquery-ui.min.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/ckeditor/ckeditor.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/matrix.popover.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/matrix.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/jquery.nok.min.js"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/app.js?v=2"></script> 
    <script src="<?php echo base_url('public/back_end/'); ?>js/my-form.js?v=2"></script> 

    <script type="text/javascript">
        function copy(arg){
            document.getElementById(arg).select(); 
            document.execCommand('copy');
            $.nok({
                message: "Kopyalama işlemi başarılı.",
                type: "success",
            });
        }

        $('#sortable').sortable({
            handle: '.sortable',
            axis: 'y',
            cursor: 'move',
            stop: function(event, ui)
            {
                var url = $(this).attr('data-url');
                var rank = $(this).sortable('serialize');

                $.ajax({
                    type: 'POST',
                    data: rank,
                    url: url,
                    beforeSend: function () {
                        $('div.loader').fadeIn(100);
                    },
                    success: function(response){
                        $('div.loader').fadeOut(100);
                        $.nok({
                            message: "Taşıma işlemi başarılı.",
                            type: "success",
                        });
                    }
                });
            }
        });
        $( "#sortable" ).disableSelection();   
    </script>


</body>
</html>