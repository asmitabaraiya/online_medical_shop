@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit Sub-SubCategory </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                            <form method="post" action="{{ route('subsubcategory.update') }}"  >
                                @csrf

                               
                                <input    name="id" type= "hidden" class="form-control"    value="{{$subsubcategory->id}}">

                                <div class="row">
                                    <div class="col-12">                                   

                                    
                                                 <div class="form-group">
                                                    <h5> Category  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="category_id" id="select"    class="form-control" aria-invalid="false">
                                                                <option value="" >Select  Category</option>
                                                                @foreach($category as $item)
                                                                    <option value="{{ $item->id }}" {{ $item->id == $subsubcategory->category_id ? 'selected' : '' }}> {{ $item->category_name_en }}</option>
                                                                @endforeach()
                                                            </select>
                                                    <div class="help-block"></div></div>
                                                </div>


                                                <div class="form-group">
                                                    <h5> SubCategory  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="subcategory_id"     class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disable="" >Select SubCategory</option>                                                               
                                                          
                                                             @foreach($subcategory as $sitem)
                                                                    <option value="{{ $sitem->id }}" {{ $sitem->id == $subsubcategory->subcategory_id ? 'selected' : '' }}> {{ $sitem->subcategory_name_en }}</option>
                                                             @endforeach()  
                                                             </select>
                                                    <div class="help-block"></div></div>
                                                </div>


                                                <div class="form-group">
                                                    <h5> Sub-SubCategory Name  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="subsubcategory_name_en" class="form-control"    value="{{$subsubcategory->subsubcategory_name_en}}">
                                                        @error('subsubcategory_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                
                                                
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Update Sub-SubCategory "  >
                                       
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

<!-- Sub category  -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/editsubcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>



@endsection