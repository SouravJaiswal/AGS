<br>
		<div class="row">	
			<div class="col-sm-5 text-right" >
				<span class="glyphicon glyphicon-folder-open" id="header-logo"></span>
			</div>
			<div class="col-sm-7" id="heading">
				<h1>Upload Repository</h1>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-9">
				<div id="dropZone">
				      <div class="panel panel-default">
				        <div class="panel-heading"><strong>Upload Files</strong></div>
				        <div class="panel-body">
				          <!-- Standar Form -->
				          <h4>Select files from your computer</h4>
				          <form action="#" method="post" enctype="multipart/form-data" id="js-upload-form">
				            <div class="form-inline">
				              <div class="form-group">
				                <input type="file" name="files[]" id="js-upload-files" multiple>
				              </div>
				              <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
				            </div>
				          </form>

				          <!-- Drop Zone -->
				          <h4>Or drag and drop files below</h4>
				          <div class="upload-drop-zone" id="drop-zone">
				            Just drag and drop files here
				          </div>

				          <!-- Progress Bar -->
				          <div class="progress">
				            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
				              <span class="sr-only">60% Complete</span>
				            </div>
				          </div>

				          <!-- Upload Finished -->
				          <div class="js-upload-finished">
				            <h3>Processed files</h3>
				            <div class="list-group">
				              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
				              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
				            </div>
				          </div>
				        </div>
				      </div>
				    </div> <!-- /container -->


				    <script type="text/javascript">
	(function(){
		var dropzone = document.getElementById('dropzone');
		var upload = function(files){
			var formData = new FormData(),
			xhr = new XMLHttpRequest(),
			x;
			for(x = 0;x<files.length;x++){
				formData.append('file[]',files[x]);
			}
			xhr.onload = function(){
				var data = JSON.parse(this.responseText);
				console.log(data);
			}
			xhr.open('post','upload.php');
			xhr.send(formData);

		}
		dropzone.ondrop = function(e){
			e.preventDefault();
			this.className = 'dropzone';
			upload(e.dataTransfer.files);
		};
		dropzone.ondragover = function(){
			this.className = 'dragover';
			return false;
		}
		dropzone.ondragleave = function(){
			this.className = 'dragzone';
			return false;
		}
	}());
</script>