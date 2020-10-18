@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body row">
                    <div class="col-3">
                        <a href="/filemanager" class="btn btn-primary">File Manager</a>
                        <p>Please add files from file ckeditor</p>
                        <p> Note: You can see all the files and folders here in list which Can be edible from file manager. This is only 2level tree structure.</p>
                    </div>
                    <div class="col-9">
                    
                        @php
       
                        $folderpath = "files/"; 

                        if (is_dir($folderpath)) { 
	
	                        $files = opendir($folderpath); { 
		                         
		                        if ($files) { 
			                        echo '<ul>';
			                        while (($subfolder = readdir($files)) !== FALSE) { 
				                        
			                            if ($subfolder != '.' && $subfolder != '..') { 
					                        echo "<li>" .$subfolder . "</li>"; 
					
				                            $dirpath = "files/" . $subfolder . "/"; 
					                        
					                        if (is_dir($dirpath)) { 
						                        $file = opendir($dirpath); { 
							                        if ($file) { 
				                                        echo '<ul>';
			                                            while (($filename = readdir($file)) !== FALSE) { 
				                                            if ($filename != '.' && $filename != '..') { 
						                                        echo "<li>".$filename . "</li>"; 
						                                    } 
						                                }
                                                        echo '</ul>';
					                                } 
				                                } 
			                                } 
					                        echo "<br>"; 
				                        } 
			                        } 
		                        } 
	                        } 
                        }
                        @endphp
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
