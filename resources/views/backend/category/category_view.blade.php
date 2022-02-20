@extends('admin.admin_master')
@section('admin')


<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Category List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Category Icon</th>
                                    <th>Category En</th>
                                    <th>Category Hin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $item)
                                <tr class="text-white">
                                    <td class="text-center"><span><i class="{{$item->category_icon}}"></i></span></td>
                                    <td>{{$item->category_name_en}}</td>
                                    <td>{{$item->category_name_hin}}</td>
                                    <td width="30%">
                                        <a href="{{route('category.edit' , $item->id)}}"   class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('category.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-trash" title="delete"></i></a>
                                                                          
                                        @if( $item->category_status == 1 )
                                            <a  href="#" class="waves-effect waves-light btn  btn-circle mx-5  btn-info " title="Please active another category"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a  href="{{route('category.status' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach()

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
  
<!-- =========================  Add Brands======================================================================     -->

        
        <div class="col-4">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Add Category  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('category.store')}}"  >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Category Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="category_name_en" class="form-control" >
                                                        @error('category_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Category Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="category_name_hin" class="form-control"  >
                                                        @error('category_name_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Category Icon <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="category_icon" class="form-control"  >
                                                        @error('category_icon')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success  mb-5" value="Add Category" >
                                       
                                        </div>
                                    </div>
                                </div>
                    </form>
               
            </div>
            <!-- /.box-body -->

            
            </div>
        </div>
    </div>

    <!-- <button class="tst1 btn btn-info btn-block mb-15">Info Message</button> -->
</section>


@endsection

