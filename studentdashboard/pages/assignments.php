<?php
error_reporting(0);
include_once('header.php');
if(isset($_POST['upload'])){
		if($_FILES["zip_file"]["name"]) {
			$filename = $_FILES["zip_file"]["name"];
			$source = $_FILES["zip_file"]["tmp_name"];
			$type = $_FILES["zip_file"]["type"];

			$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
			foreach($accepted_types as $mime_type) {
				if($mime_type == $type) {
					$okay = true;
					break;
				}
			}
			$continue = strpos($type, 'zip');
			if(!$continue) {
				$message = "The file you are trying to upload is not a .zip file. Please try again.";
			} else {
				$path = dirname(__FILE__).'/';
				$filenoext = basename ($filename, '.zip');
				$filenoext = basename ($filenoext, '.ZIP');
				$targetdir = strstr($path, 'studentdashboard' , true);
				$targetdir = $targetdir . 'Assignments/' . $_SESSION['id'] .'/' . $filenoext;
				$targetzip = $path . $filename; // target zip file
				echo $targetdir;
				if (is_dir($targetdir)){
					$targetdir = $targetdir . '_' .rand() ;
				}

				mkdir($targetdir, 0777);

				if(move_uploaded_file($source, $targetzip)) {
					$zip = new ZipArchive();
					$x = $zip->open($targetzip);  // open the zip file to extract
					if ($x === true) {
						$zip->extractTo($targetdir); // place in the directory with same name
						$zip->close();
						unlink($targetzip);
					}
					$message = "Your .zip file was uploaded and unpacked.";
				} else {
					$message = "There was a problem with the upload. Please try again.";
				}
			}

		}
	}
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Assignments</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload the zip file
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
									<?php if($message) echo "<p>$message</p>"; ?>
									<form role="form" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="zip_file"></br>
                                            <button type="submit" class="btn btn-default" name="upload">Submit Assignment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include_once('footer.php'); ?>
