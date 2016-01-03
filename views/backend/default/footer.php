<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div>
<footer class="footerpadding">
        <div class="row">
          <div class="col-lg-12">
            <p class="pull-right"><a href="#top">Back to top</a></p>
            <p>Proudly powered by <a href="http://www.dhoblog.org/">dhoBlog</a>.</p>
            <p>Website theme by <a href="http://www.ridho.id/">Mutasim Ridlo, S.Kom</a>.</p>
          </div>
        </div>
</footer>
</div>
    <script src="<?php echo base_url('views/backend/default/assets/js/jquery-1.11.3.min.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/third_party/tinymce/tinymce.min.js');?>"></script>
    <script>
      tinymce.init({
        selector: '#categorydescription'
      });
      tinymce.init({
        selector: '#postexcerpt'
      });
      tinymce.init({
        selector: '#postcontent',
        plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
      ],
      toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      toolbar2: 'print preview media | forecolor backcolor emoticons',
      image_advtab: true,
      });
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
            $('#select_all').on('click',function(){
                if(this.checked){
                    $('.select_all').each(function(){
                        this.checked = true;
                    });
                }else{
                     $('.select_all').each(function(){
                        this.checked = false;
                    });
                }
            });

            $('.select_all').on('click',function(){
                if($('.select_all:checked').length == $('.select_all').length){
                    $('#select_all').prop('checked',true);
                }else{
                    $('#select_all').prop('checked',false);
                }
            });
        });
        </script>
</body>
</html>