<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2">Resim</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <img class="rounded avatar-lg" src="{{ (!empty(Auth::user()->image)) ? url('upload/admin/'.Auth::user()->image): url('upload/emptyimage.jpeg') }}" alt="" id="showimage">
                        </div>
                    </div>

                    <label for="example-text-input" class="col-sm-2"></label>
                    <input type="submit" class="btn btn-info bg-dark" value="Update Image">
                </form>


            </div>
        </div>
    </div> <!-- end col -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>