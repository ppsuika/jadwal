 <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/froala_editor.min.js')?>" ></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/align.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/char_counter.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/code_beautifier.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/code_view.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/colors.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/draggable.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/emoticons.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/entities.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/file.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/font_size.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/font_family.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/fullscreen.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/image.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/image_manager.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/line_breaker.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/inline_style.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/link.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/lists.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/paragraph_format.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/paragraph_style.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/quick_insert.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/quote.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/table.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/save.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/url.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/video.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/help.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/print.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/third_party/spell_checker.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/special_characters.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/third_party/fabric.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/third_party/tui-code-snippet.min.js')?>"></script>
  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/third_party/tui-image-editor.min.js')?>"></script>

  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/third_party/image_tui.min.js')?>"></script>


  <script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/frola/js/plugins/word_paste.min.js')?>"></script>

  <script>
    $(function(){
      $('#editor').froalaEditor({
         // toolbarButtons: ["undo", "redo", "bold", "italic", "underline", "strikeThrough", "selectAll", "paragraphStyle", "subscript", "superscript", "paragraphFormat", "fontFamily", "fontSize", "align", "formatOL", "formatUL", "outdent", "indent", "quote", "color", "emoticons", "insertTable", "createLink", "insertImage", "insertVideo", "insertFile", "fullscreen", "html", "save", "insertHR"]

         // toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'inlineStyle', 'inlineClass', 'clearFormatting', '|', 'emoticons', 'fontAwesome', 'specialCharacters', '-', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '-', 'insertHR', 'selectAll', 'getPDF', 'print', 'help', 'html', 'fullscreen', '|', 'undo', 'redo']
         inlineClasses: {
          'fr-class-code': 'Code',
          'fr-class-highlighted': 'Highlighted',
          'fr-class-transparency': 'Transparent'
        },
         height: 500,
         toolbarButtons : ['bold', 'italic', 'underline', 'strikeThrough', '|', 'fontFamily', 'fontSize', 'color', '|', 'paragraphFormat', 'lineHeight', 'paragraphStyle', 'align', '-','formatOL', 'formatUL', 'quote', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'html', 'fullscreen',],

         // IMAGE LOAD

          imageManagerLoadURL: '<?= base_url('admin/users/imageLoad') ?>',
           imageManagerPageSize: 20 ,

          // Tetapkan offset gulir (nilai dalam piksel). 
          imageManagerScrollOffset: 10 ,

          //DELETE
          imageManagerDeleteURL:"<?= base_url('admin/users/imageDelete') ?>",imageManagerDeleteMethod:"post",imageManagerDeleteParams:{param: 'src'},
          imageUploadParam: 'image_param',

          imageUploadURL: '<?= base_url('admin/users/uploadImageEditor') ?>',

        // Additional upload params.
        imageUploadParams: {id: 'editor'},

        // Set request type.
        imageUploadMethod: 'POST',

        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,

        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png'],
        imageMultipleStyles : true ,
        imageStyles: {
          img: 'img',
          class2: 'img-responsive',
        }
      })

      //Image Class


      .on('froalaEditor.image.removed', function (e, editor, $img) {
        $.ajax({
          // Request method.
          method: "POST",

          // Request URL.
          url: "<?= base_url('admin/users/imageDelete') ?>",

          // Request params.
          data: {
            src: $img.attr('data-name')
          }
        })
        .done (function (data) {
          console.log ('image was deleted');
        })
        .fail (function () {
          console.log ('image delete problem');
        })
      })



      .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
        // Return false if you want to stop the image upload.
      })
      .on('froalaEditor.image.uploaded', function (e, editor, response) {
        // Image was uploaded to the server.
      })
      .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
        $('img').addClass('img img-responsive')

      })
      .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
        // Image was replaced in the editor.
      })
      .on('froalaEditor.image.error', function (e, editor, error, response) {
        // Bad link.
        if (error.code == 1) { console.log(error.code); }

        // No link in upload response.
        else if (error.code == 2) { console.log(error.code); }

        // Error during image upload.
        else if (error.code == 3) { console.log(error.code); }

        // Parsing response failed.
        else if (error.code == 4) { console.log(error.code); }

        // Image too text-large.
        else if (error.code == 5) { console.log(error.code); }

        // Invalid image type.
        else if (error.code == 6) { console.log(error.code); }

        // Image can be uploaded only to same domain in IE 8 and IE 9.
        else if (error.code == 7) { console.log(error.code); }
      });


    });


  </script>