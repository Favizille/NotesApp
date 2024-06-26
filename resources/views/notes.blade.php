<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="dashboard.css">
  </head>
  <body>
    <div class="page-content container note-has-grid">
        <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
            <div class="mx-5 px-5">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active mx-5" id="all-category">
                        <i class="icon-layers mr-1"></i><span class="d-none d-md-block">All Notes</span>
                    </a>
                </li>
            </div>
            
            <div class="search mx-5 px-5">
                <input type="text" placeholder="search" class="border-0 bg-light rounded-pill px-5 py-3 text-center">
            </div>
            
            <div class="mx-3 px-5">

                    <li class="nav-item ml-auto">
                        <a href="javascript:void(0)" class="nav-link btn-primary rounded-pill d-flex align-items-center mx-5 px-5" id="add-notes"> <i class="icon-note m-1"></i><span class="d-none d-md-block font-14">Add Notes</span></a>
                    </li>
            </div>
        </ul>
        <div class="mx-5 p-5">
            @if(count($errors) > 0)
                @foreach( $errors->all() as $message )
                    <div class="alert alert-danger display-hide">
                    <span>{{ $message }}</span>
                    </div>
                @endforeach

            @endif


            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="tab-content bg-transparent">
            <div id="note-full-container" class="note-has-grid row">
                <div class="col-md-4 single-note-item all-category" style="">
                    <div class="card card-body">
                        <span class="side-stick"></span>
                        <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Book a Ticket for Movie <i class="point fa fa-circle ml-1 font-10"></i></h5>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <div class="note-content">
                            <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                            <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                            <div class="ml-auto">
                                <div class="category-selector btn-group">
                                    <a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                        <div class="category">
                                            <div class="category-business"></div>
                                            <div class="category-social"></div>
                                            <div class="category-important"></div>
                                            <span class="more-options text-dark"><i class="icon-options-vertical"></i></span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right category-menu">
                                        <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);">
                                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                        </a>
                                        <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);">
                                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social
                                        </a>
                                        <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);">
                                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add notes -->
        <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title text-white">Add Notes</h5>
                    </div>
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <form action="{{route("note.create")}}" method="POST" id="addnotesmodalTitle">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="note-title">
                                                <label>Note Title</label>
                                                <input type="text" id="note-has-title" class="form-control" minlength="" placeholder="Title" name="title"/>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="note-description">
                                                <label>Note Description</label>
                                                <textarea id="note-has-description" class="form-control" minlength="" placeholder="Description" rows="3" name="body"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <button id="btn-n-save" class="float-left btn btn-success" style="display: none;">Save</button> --}}
                                        <button class="btn btn-danger" data-dismiss="modal">Discard</button>
                                        <button class="btn btn-info">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="dashboard.js"></script>
  </body>
</html>