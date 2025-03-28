@extends('admin.admin_master')

@section('admin')
 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">All Categories</h4>
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>operation</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            	@php
                                            	($count = 1)
                                            	@endphp

                                            	@foreach($categoryAll as $category)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{$category->categoryName}}</td>
                                                <td><img src="{{(!empty($category->imageUrl))?url($category->imageUrl):
                                        url('upload/no-image.jpg')}}"style="width: 50px; height: 50px;"></td>
                                                <td>
                                                    <a href="{{route('category.edit',$category->id)}}"
                                                        class="btn btn-info sm m-2"
                                                        title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                   </td>
                                                <td>{{$category->description}}</td>
                                            </tr>
                                           @endforeach
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
 
                    </div> <!-- container-fluid -->
                </div>
@endsection