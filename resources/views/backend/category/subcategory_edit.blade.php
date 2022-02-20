@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit SubCategory </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                            <form method="post" action="{{ route('subcategory.update') }}"  >
                                @csrf

                               
                                <input    name="id" type= "hidden" class="form-control"   value="{{$subcategory->id}}">

                                <div class="row">
                                    <div class="col-12">                                   
                                    
                                                 <div class="form-group">
                                                    <h5> Category  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="category_id" id="select"   class="form-control" aria-invalid="false">
                                                                <option value="" >Select  Category</option>
                                                                @foreach($category as $item)
                                                                    <option value="{{ $item->id }}" {{ $item->id == $subcategory->category_id ? 'selected' : '' }}  >{{ $item->category_name_en }}</option>
                                                                @endforeach()
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    <div class="help-block"></div></div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> SubCategory Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="subcategory_name_en" class="form-control"   value="{{$subcategory->subcategory_name_en}}">
                                                        @error('subcategory_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> SubCategory Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="subcategory_name_hin" class="form-control"   value="{{$subcategory->subcategory_name_hin}}" >
                                                        @error('subcategory_name_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Update SubCategory" >
                                       
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