<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Orderan</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dropzone.min.css');?>">
</head>
<body>
	<div class="container">
		<div class="container">
            <h4>Data Isian</h4>
            <form action="upload.php" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="" >
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="" >
                </div>
                <div class="form-group">
				    <label>Alamat</label>
					<input type="text" name="sale_alamat" class="form-control" id="sale_alamat" placeholder="" >
				 </div>
                 <div class="form-group">
                    <label>File</label>
                    <div class="dropzone" id="myDropzone"></div>
				 </div>
                <button id="submit-all" class="btn btn-success">Tambah Data</button>
            </form>
		</div>
	</div>

	<script src="<?php echo base_url('assets/js/jquery-3.3.1.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js')?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/dropzone.min.js')?>" type="text/javascript"></script>
	<script type="text/javascript">
		Dropzone.options.myDropzone= {
		url: "<?php echo site_url('orderan/do_upload');?>",
		autoProcessQueue: false,
		uploadMultiple: true,
		parallelUploads: 5,
		maxFiles: 5,
		maxFilesize: 1,
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		addRemoveLinks: true,
        init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("title", jQuery("#title").val());
            formData.append("description", jQuery("#description").val());
            formData.append("sale_alamat", jQuery("#sale_alamat").val());
        });
    }
	}
		$(document).ready(function(){
		    $('#title').autocomplete({
                source: "<?php echo site_url('orderan/get_autocomplete');?>",
                
                select: function (event, ui) {
                    $('[name="title"]').val(ui.item.label); 
                    $('[name="description"]').val(ui.item.description); 
					$('[name="sale_alamat"]').val(ui.item.sale_alamat); 
                }
            });

		});
	</script>

</body>
</html>