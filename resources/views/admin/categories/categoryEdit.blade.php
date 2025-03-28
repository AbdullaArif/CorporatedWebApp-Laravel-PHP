@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content"> 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8"> 
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category Edit</h4>

                        <form method="POST" action="{{route('category.update.form')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$CategoryEdit->id}}">
                            <input type="hidden" name="oldImage" value="{{$CategoryEdit->imageUrl}}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Category name</label>
                                <input class="form-control" type="text" name="categoryName" id="categoryName"  placeholder="Enter category name"
                                value="{{$CategoryEdit->categoryName}}">
                                @error('categoryName')
                                <span class="text-danger">{{$Message}}</span>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="title" class="form-label">Category Key</label>
                                <input class="form-control" type="text" name="categoryKey" id="categoryKey"  placeholder="Enter category key"
                                value="{{$CategoryEdit->categoryKey}}">
                                 @error('categoryKey')
                                <span class="text-danger">{{$Message}}</span>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="title" class="form-label">Category description</label>
                                <input class="form-control" type="text" name="description" id="description"  placeholder="Enter category description"
                                value="{{$CategoryEdit->description}}">
                            </div>
                            <!-- Image upload area -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image url</label>
                                <input type="file" class="form-control" name="image" id="image"     class="form-control">
                            </div>
                            <!-- indiki image -->
                            <div class="mb-3 text-center">
                                <img class="rounded-circle img-thumbnail" width="150"
                                    src="{{(!empty($CategoryEdit->imageUrl))?url($categoryEdit->imageUrl):
                                        url('upload/no-image.jpg')}}" 
                                    alt="Profile Image" id="showimage">
                            </div>

                            <!-- update Button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light"
                        value="Update Category">
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