
    
    <div class="col-md-3">
        <ul class="ver-inline-menu tabbable margin-bottom-10">
            
                <div dtpart="body">     
                </div>

        </ul>
    </div>

    <div class="col-md-9" name="singleupload" style="display: block;">
        <div class="tab-content">
            <div class="tab-pane active">
                <h3><span datax="NamaFileH"></span></h3>
                <p><span datax="NotesFileH"></span></p>
                <form action="#" role="form">
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA.png&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="..."> 
                                </span>
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Download </a>
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                    <div class="margin-top-10">
                        <a href="javascript:;" class="btn green"> Upload </a>
                        <a href="javascript:;" class="btn default"> Cancel </a>
                    </div>
                    <br>
                    <hr>
                    <div class="clearfix margin-top-10">
                        <span class="label label-danger"> NOTE! </span>
                        <span style="font-size: 10px;"> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-9" name="multipleupload" style="display: none;">
        <h3><span datax="NamaFileH"></span></h3>
        <p><span datax="NotesFileH"></span></p>
        <form id="fileupload" action="#" method="POST" enctype="multipart/form-data">
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="col-lg-7">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="btn green fileinput-button">
                        <i class="fa fa-plus"></i>
                        <span> Add files... </span>
                        <input type="file" name="files[]" multiple=""> </span>
                    <button type="submit" class="btn blue start">
                        <i class="fa fa-upload"></i>
                        <span> Start upload </span>
                    </button>
                    <button type="reset" class="btn warning cancel">
                        <i class="fa fa-ban-circle"></i>
                        <span> Cancel upload </span>
                    </button>
                    <button type="button" class="btn red delete">
                        <i class="fa fa-trash"></i>
                        <span> Delete </span>
                    </button>
                    <input type="checkbox" class="toggle">
                    <!-- The global file processing state -->
                    <span class="fileupload-process"> </span>
                </div>
                <!-- The global progress information -->
                <div class="col-lg-5 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                    </div>
                    <!-- The extended global progress information -->
                    <div class="progress-extended"> &nbsp; </div>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped clearfix">
                <tbody class="files"> </tbody>
            </table>
        </form>

        <!-- The blueimp Gallery widget -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
            <div class="slides"> </div>
            <h3 class="title"></h3>
            <a class="prev"> ‹ </a>
            <a class="next"> › </a>
            <a class="close white"> </a>
            <a class="play-pause"> </a>
            <ol class="indicator"> </ol>
        </div>
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td>
                    <span class="preview"></span>
                </td>
                <td>
                    <p class="name">{%=file.name%}</p>
                    <strong class="error label label-danger"></strong>
                </td>
                <td>
                    <p class="size">Processing...</p>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                    </div>
                </td>
                <td> {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn blue start" disabled>
                        <i class="fa fa-upload"></i>
                        <span>Start</span>
                    </button> {% } %} {% if (!i) { %}
                    <button class="btn red cancel">
                        <i class="fa fa-ban"></i>
                        <span>Cancel</span>
                    </button> {% } %} </td>
            </tr> {% } %} </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview"> {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                            <img src="{%=file.thumbnailUrl%}">
                        </a> {% } %} </span>
                </td>
                <td>
                    <p class="name"> {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                        <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}
                    <div>
                        <span class="label label-danger">Error</span> {%=file.error%}</div> {% } %} </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td> {% if (file.deleteUrl) { %}
                    <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'
                        {% } %}>
                        <i class="fa fa-trash-o"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                    <button class="btn yellow cancel btn-sm">
                        <i class="fa fa-ban"></i>
                        <span>Cancel</span>
                    </button> {% } %} </td>
            </tr> {% } %} </script>
        <!-- END PAGE BASE CONTENT -->
    </div>
    
    <!--end col-md-9-->
