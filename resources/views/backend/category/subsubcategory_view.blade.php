@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border margin-top-10">
                    <h3 class="box-title">Sub-SubCategory List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-white">
                                    <th>Category </th>
                                    <th>SubCategory </th>
                                    <th>SubSubCategory </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub_subcategory as $item)
                                <tr class="text-white">
                                    <td>{{$item['category']['category_name_en']}}</td>
                                    <td>{{$item['subcategory']['subcategory_name_en']}}</td>
                                    <td>{{$item->subsubcategory_name_en}}</td>
                                   
                                    <td width="30%">
                                        <a href="{{route('subsubcategory.edit' , $item->id ) }}" class="waves-effect waves-light btn  btn-circle mx-5  btn-info" ><i class="fa fa-pencil" title="Edit"></i></a>
                                       	
  <!-- Modal -->
  <div class="modal center-modal fade" id="modal-center{{$item->id}}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <h1 class="text-center"><i class="fa fa-trash fa-3x "></i><h1>  <h2 class="text-center"> Are you sure to Delete It !</h2>
        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="{{route('subsubcategory.delete' , $item->id)}}" id="modalClick" class="btn btn-rounded btn-danger float-right">Delete</a>
        </div>
      </div>
    </div>
  </div>
<!-- /.modal -->

<a  class="waves-effect waves-light btn  btn-circle mx-5  btn-info" data-toggle="modal" data-target="#modal-center{{$item->id}}" ><i class="fa fa-trash" title="delete"></i></a>

                                       
                                       
                                          
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
                <h3 class="box-title">Add Sub-SubCategory  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('subsubcategory.store')}}"  >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                              
                                                <div class="form-group">
                                                    <h5> Category  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="category_id" id="select"    class="form-control" aria-invalid="false">
                                                                <option value="">Select  Category</option>
                                                                @foreach($category as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>
                                                                @endforeach()
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    <div class="help-block"></div></div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> SubCategory  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                            <select name="subcategory_id"     class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disable="" >Select SubCategory</option>                                                               
                                                            </select>
                                                            @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                               

                                                    <div class="help-block"></div></div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> SubSubCategory Name  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text"  name="subsubcategory_name_en" class="form-control"    >
                                                        @error('subsubcategory_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                               

                                               
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Add Sub-SubCategory" >
                                       
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
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
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