@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Edit Category
    @endsection
    @section('page-main-title')
        Edit Category
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('edit-category-submit',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card"> 
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-12">
                                        <label for="name">Category</label>
                                        <input type="text" name="name" id="" value="{{$category->name}}" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="{{route('list-category')}}" class="btn btn-danger" >Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Edit Category">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
