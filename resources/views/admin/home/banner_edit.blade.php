@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content"> 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8"> 
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner Edit</h4>

                        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter title" value="{{ $homeBanner->Tittle }}">
                            </div>
                               <div class="mb-3">
                                <label for="title" class="form-label">Sub Title</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter title" value="{{ $homeBanner->subTittle }}">
                            </div>
                               <div class="mb-3">
                                <label for="title" class="form-label">Url</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter title" value="{{ $homeBanner->url }}">
                            </div>
                               <div class="mb-3">
                                <label for="title" class="form-label">Video Url</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter title" value="{{ $homeBanner->videoUrl }}">
                            </div>
                               <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter title" value="{{ $homeBanner->Tittle }}">
                            </div>
                               <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Enter title" value="{{ $homeBanner->Tittle }}">
                            </div>

                            <!-- Resim Yükleme Alanı -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image url</label>
                                <input type="file" class="form-control" name="image" id="image"     class="form-control">
                            </div>

                            <!-- Mevcut Resim -->
                            <div class="mb-3 text-center">
                                <img class="rounded-circle img-thumbnail" width="150"
                                    src="{{ (!empty($homeBanner->image)) ? url('upload/banner/'.$homeBanner->image) : url('upload/emptyimage.jpeg') }}" 
                                    alt="Profile Image" id="showimage">
                            </div>

                            <!-- Güncelleme Butonu -->
                        
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container-fluid -->
</div> <!-- page-content -->

<!-- Resim Önizleme Scripti -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection