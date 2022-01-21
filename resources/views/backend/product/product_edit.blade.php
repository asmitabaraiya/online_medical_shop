@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Product</h4>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form method="post" action="{{route('product.update')}}" >
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}" class="form-control">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row"> <!-- Start 1st row -->
                                        <div class="col-md 4"> 
                                            <div class="form-group">
                                                        <h5> Brand  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select name="brand_id" id="select" required="" class="form-control" aria-invalid="false">
                                                                    <option value="" >Select  Brand</option>
                                                                    @foreach($brand as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->brand_id ? 'selected' : '' }} >{{ $item->brand_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>            
                                        </div> 

                                        <div class="col-md 4"> 
                                                    <div class="form-group">
                                                        <h5> Category  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select name="category_id" id="select" required="" class="form-control" aria-invalid="false">
                                                                    <option value="" >Select  Category</option>
                                                                    @foreach($category as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->category_id ? 'selected' : '' }} >{{ $item->category_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>  

                                        </div> 

                                        <div class="col-md 4"> 
                                                    <div class="form-group">
                                                        <h5> SubCategory  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select name="subcategory_id" id="select" required="" class="form-control" aria-invalid="false">
                                                                <option value="" selected="" disable="" >Select SubCategory</option>
                                                                    @foreach($subcategory as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->subcategory_id ? 'selected' : '' }} >{{ $item->subcategory_name_en }}</option>
                                                                    @endforeach()
                                                                
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div> 
                                        </div>                                                                           
                                    </div> <!--end 1 -->

                                    <div class="row"> <!-- Start 2st row -->
                                        <div class="col-md 4"> 
                                            <div class="form-group">
                                                <h5> SubCategory  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" id="select" required="" class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disable="" >Select SubSubCategory</option>  
                                                                    @foreach($subsubcategory as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->subsubcategory_id ? 'selected' : '' }} >{{ $item->subsubcategory_name_en }}</option>
                                                                    @endforeach()                                                           
                                                        </select>
                                                    <div class="help-block"></div></div>
                                            </div> 
                                        </div>  

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Name En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control" required value="{{$product->product_name_en}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Name Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_hin" class="form-control" required  value="{{$product->product_name_hin}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>    
                                        </div>

                                    </div> <!--end 2 -->

                                    <div class="row"> <!-- Start 3st row -->
                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" class="form-control" required   value="{{$product->product_code}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" class="form-control" required  value="{{$product->product_qty}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div> <!--end 3 -->

                                    <div class="row"> <!-- Start 4st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="product_tags_en" class="form-control"  value="{{$product->product_tags_en}}"   data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Tags Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="product_tags_hin" class="form-control"  value="{{$product->product_tags_hin}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> <!-- Start 5st row -->
                                        

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Size En <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="product_size_en" class="form-control"  value="{{$product->product_size_en}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Size Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="product_size_hin" class="form-control"  value="{{$product->product_size_hin}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!--end 4 -->

                                    <div class="row"> <!-- Start 6st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Color En <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="product_color_en" class="form-control"  value="{{$product->product_color_en}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Color Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="product_color_hin" class="form-control"  value="{{$product->product_color_hin}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>                                       

                                    </div> <!--end 6 -->
                                    
                                    <div class="row">  <!-- Start 7st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price" class="form-control" required="" value="{{$product->selling_price}}"  data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price" class="form-control" required="" value="{{$product->discount_price}}" data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="row"> <!-- Start 9st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea  name="short_descp_en" id="textarea" class="form-control"   required  data-validation-required-message="This field is required"> {{$product->short_descp_en}} </textarea>   
                                                <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <textarea  name="short_descp_hin" id="textarea" class="form-control"  required  data-validation-required-message="This field is required"> {{$product->short_descp_hin}} </textarea> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>   
                                        </div>

                                    </div> <!--end 9 -->

                                    <div class="row"> <!-- Start 10t row -->
                                        <div class="col-md 6">
                                            <div class="box">
                                                <div class="box-header">
                                                  <h5>Long Description English <span class="text-danger">*</span></h5>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                        <textarea id="editor1" class="form-control" placeholder="Long Description English" name="long_descp_en"  required="" rows="10" cols="80"> {{$product->long_descp_en}} </textarea>  
                                                                                                        
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                        <div class="col-md 6">
                                            <div class="box">
                                                <div class="box-header">
                                                  <h5>Long Description Hindi <span class="text-danger">*</span></h5>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">                                                   
                                                        <textarea id="editor2" class="form-control" placeholder="Long Description Hindi" name="long_descp_hin" required="" rows="10" cols="80"> {{$product->long_descp_hin}}</textarea>                                            
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                    </div> <!--end 10 -->
                                                                 
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                       
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals"  value="1" {{ $product->hot_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4"  name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-primary mb-5 " value="Update Product" >                                       
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

                                   <!-- Multiple Image update area -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>
                    <form method="post" action="{{route('product.imageUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($multiImg as $img)
                                <div class="col-md-3">
                                    <div class="card my-2" >
                                        <img src="{{asset($img->photo_name)}}" class="card-img-top mx-2" style="heigth: 100px; width: 100px;" >
                                        <div class="card-body">
                                            <a href="{{route('product.multiImage' , $img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"> <i class = "fa fa-trash"></i> </a>
                                            <div class="card-text">
                                                <label  class="form-control-label"> Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="multi_img[{{ $img->id }}]" class="form-group">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-layout-footer">
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-primary mb-5 mx-3 my-2 " value="Update Image" >                                       
                            </div>   
                        </div>
                    </form>
				</div>
            </div>
        </div>
    </section>

               <!-- Main thamnail Image -->

               <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box bt-3 border-info">
                                <div class="box-header">
                                    <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                                </div>
                                <form method="post" action="{{route('product_mainThamb.imageUpdate')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row row-sm">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                                            
                                            <div class="col-md-3">
                                                <div class="card my-2" >
                                                    <img src="{{asset($product->product_thumbnail)}}"  class="card-img-top mx-2" style="heigth: 100px; width: 100px;" >
                                                   
                                                    <div class="card-body">
                                                        <div class="card-text">
                                                            <label  class="form-control-label"> Change Image <span class="tx-danger">*</span></label>
                                                            <input type="file" name="product_thumbnail" class="form-group">
                                                            <img src="" class="my-1" id="mainThumb">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                      
                                    </div>

                                    <div class="form-layout-footer">
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-primary mb-5 mx-3 my-2 " value="Update Image" >                                       
                                        </div>   
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
             </section>          
</div>




<!-- Sub category  -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/product/editsubcategory/ajax') }}/"+category_id,
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

<!-- SubSub category  -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/product/editsubsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>


<!-- Script for main thumb -->
<script type="text/javascript">
    function mainThamUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){              
                $('#mainThumb').attr('src' , e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- Script for multiple image -->
<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80) 
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>


@endsection


<!-- <div class="row">                                     
    <div class="col-md 4">
        <div class="form-group">
            <h5>Main Thumbnail <span class="text-danger">*</span></h5>
            <div class="controls">     
                <input type="file" name="product_thumbnail" class="form-control" onChange="mainThamUrl(this)"   required="" >                                                                           
                <img src="" class="my-1" id="mainThumb">
            </div>
        </div>
    </div>

    <div class="col-md 4">
        <div class="form-group">
            <h5>Multipale Images <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file" name="multi_image[]" id="multiImg" class="form-control" required=""  multiple=""> 
                <div class="help-block"></div>
            </div>
            <div class="row my-2" id="preview_img">

            </div>
        </div>
    </div>

</div> -->