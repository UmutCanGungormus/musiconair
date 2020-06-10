<div class="container-fluid px-0 pr-0 mt-5">

    <div class="container mt-2">
        <div class="row mt-4 text-center">
            <div class="col-md-6 bg-dark border" style="height: 90px;">
                <h3 class="text-white" style="line-height: 90px;">REKLAM ALANI</h3>
            </div>
            <div class="col-md-6 bg-dark border" style="height: 90px;">
                <h3 class="text-white" style="line-height: 90px;">REKLAM ALANI</h3>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12 p-0">
                <h2>1 - Hangi Diziyi İzliyorsun?</h2>
                <img src="https://placehold.it/1600x450&text=1600x450" class="img-fluid">
            </div>

            <form action="#" method="post">
                <div class="row mt3">

                    <div class="col-md-6 my-3">
                        <img src="https://placehold.it/550x350" alt="metin">
                        <input type="checkbox" class="secilenDizi" name="secilenDizi" value="film adı"> <span
                                style="font-size: larger">film</span>
                    </div>
                    <div class="col-md-6 my-3">
                        <img src="https://placehold.it/550x350" alt="metin">
                        <input type="checkbox" class="secilenDizi" name="secilenDizi" value="film adı"><span
                                style="font-size: larger">film</span>
                    </div>

                </div>
            </form>
        </div>

        <script type="text/javascript">
            window.addEventListener("DOMContentLoaded", function () {
                var diziler = $(".secilenDizi");
                diziler.click(function (event) {
                    for (var i = 0; i < diziler.length; i++) {
                           diziler.prop("checked",false);
                           $(this).prop("checked",true);

                    }
                });


            });
        </script>


        <div class="row mt-1">
            <div class="col-md-12 p-0">
                <h2>2 - Hangi Diziyi İzliyorsun?</h2>
                <img src="https://placehold.it/1600x450&text=1600x450" class="img-fluid">

                <div class="row mt-3">

                    <?php for ($i = 1; $i <= 8; $i++): ?>
                        <div class="col-md-3 my-3">
                            <img src="https://placehold.it/350x350&text=350x350" class="img-fluid">
                            <div>
                                <input type="checkbox" name="Players[]" class="mt-3" id="<?php echo $i; ?>">
                                <label for="<?php echo $i; ?>"> <b>The Players</b></label>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <a href="#" class="btn btn-danger mx-auto">İlerle</a>
                </div>
            </div>
        </div>


    </div>
</div>
</section>
<script>

</script>
