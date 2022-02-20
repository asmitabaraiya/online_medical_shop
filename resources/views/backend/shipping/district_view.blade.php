@extends('admin.admin_master')
@section('admin')

<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Shipping District List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Division </th>
                                    <th> District</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($districts as $item)
                                <tr class="text-white" >
                                    <td>{{$item['division']['division_name']}}</td>
                                    <td>{{$item->district_name}}</td>
                                  
                                    <td width="30%">
                                        <a href="{{route('district.edit' , $item->id ) }}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                        <a href="{{route('district.delete' , $item->id)}}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" id="delete"><i class="fa fa-trash" title="delete"></i></a>
                                          
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
                <h3 class="box-title">Add District  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('district.store')}}"  >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                              
                                                <div class="form-group">
                                                    <h5>Select Divisions  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="division_id" id="select"    class="form-control" aria-invalid="false">
                                                                <option value="">Select  Divisions</option>
                                                                @foreach($divisions as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                                                @endforeach()
                                                            </select>
                                                            @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    <div class="help-block"></div></div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> District name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="district_name" class="form-control"    >
                                                        @error('district_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                               
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Add District" >
                                       
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