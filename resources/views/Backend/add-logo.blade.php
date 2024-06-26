@extends('backend.master')
@section('content')

    @section('site-title')
        Admin | Add Logo
    @endsection
    @section('page-main-title')
        Add Logo
    @endsection

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl-12">
                <!-- File input -->
                <form action="{{route('add-logo-submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="formFile" class="form-label">Thumbnail</label>
                                    <input class="form-control" type="file" name="thumbnail" />
                                    @if ($errors->first('thumbnail'))
                                        <span class="text-danger"  >{{($errors->first('thumbnail'))}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="btn btn-danger" >Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Add Logo">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
