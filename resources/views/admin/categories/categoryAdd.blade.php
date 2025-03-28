@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content"> 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8"> 
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category add</h4>

                        <form method="POST" action="{{ route('category.add.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf
                            
                            <div class="mb-3 form-group">
                                <label for="title" class="form-label">Category name</label>
                                <input class="form-control " type="text" name="categoryName"  placeholder="Enter category name">
                                @error('categoryName')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                             <div class="mb-3" form-group>
                                <label for="title" class="form-label">Category Key</label>
                                <input class="form-control" type="text" name="categoryKey" placeholder="Enter category key">
                                 @error('categoryKey')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                             <div class="mb-3" form-group>
                                <label for="title" class="form-label">Category description</label>
                                <input class="form-control" type="text" name="description"  placeholder="Enter category description">
                            </div>
                            <!-- Image upload area -->
                            <div class="mb-3" form-group>
                                <label for="image" class="form-label">Image url</label>
                                <input type="file" class="form-control" name="image" id="image"class="form-control">
                            </div>
                            <!-- indiki image -->
                            <div class="mb-3 text-center">
                                <img class="rounded-circle img-thumbnail" width="150"
                                    src="{{url('upload/emptyimage.jpeg')}}" 
                                    alt="Profile Image" id="showimage">
                            </div>

                            <!-- update Button -->
                        <input type="submit" class="btn btn-info waves-effect waves-light"
                        value="Add Category">
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



<!-- not empty no refresh -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: 
            {
                categoryName: 
                {
                    required : true,
                },

                categoryKey: 
                {
                    required : true,
                },

                description: 
                {
                    required : true,
                },

                imageUrl: 
                {
                    required : true,
                },
            }, // end rules

            messages :
            {
                categoryName: 
                {
                    required : 'Kategori adı giriniz',
                },

                categoryKey: 
                {
                    required : 'Anahtar giriniz',
                },

                description: 
                {
                    required : 'Açıklama giriniz',
                },

                imageUrl: 
                {
                    required : 'Resim giriniz',
                },
            }, // end message 

            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },

            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },

            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
<!-- not empty no refresh  -->

@endsection