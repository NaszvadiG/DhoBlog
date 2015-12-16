</div>
    <script src="<?php echo base_url('views/backend/default/assets/js/jquery-1.11.3.min.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/js/metisMenu.min.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/js/custom.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/third_party/dataTables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('views/backend/default/assets/third_party/dataTables/dataTables.bootstrap.js');?>"></script>
    <script>
    $(document).ready(function() {
        $('#posts').dataTable();
        $('#categories').dataTable();
    });
    </script>
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
</body>
</html>
