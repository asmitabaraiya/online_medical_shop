@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit District </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                            <form method="post" action="{{ route('district.update') }}"  >
                                @csrf

                               
                                <input    name="id" type= "hidden" class="form-control"    value="{{$districts->id}}">

                                <div class="row">
                                    <div class="col-12">                                   
                                    
                                                 <div class="form-group">
                                                    <h5>Select Division  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="division_id" id="select"    class="form-control" aria-invalid="false">
                                                                <option value="" >Select  Division</option>
                                                                @foreach($divisions as $item)
                                                                    <option value="{{ $item->id }}" {{ $item->id == $districts->division_id ? 'selected' : '' }}  >{{ $item->division_name }}</option>
                                                                @endforeach()
                                                            </select>
                                                            @error('division_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    <div class="help-block"></div></div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> District Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="district_name" class="form-control"    value="{{$districts->district_name}}">
                                                        @error('district_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Update District" >
                                       
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