@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Medicine</h4>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form method="post" action="{{route('medicine.store')}}" enctype="multipart/form-data">
                            @csrf
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
                                                                        <option value="{{ $item->id }}"   >{{ $item->brand_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>            
                                        </div> 

                                        <div class="col-md 4"> 
                                                    <div class="form-group">
                                                        <h5>Medicine Category  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select name="medicine_category_id" id="select" required="" class="form-control" aria-invalid="false">
                                                                    <option value="" >Select Medicine Category</option>
                                                                    @foreach($medicineCategory as $item)
                                                                        <option value="{{ $item->id }}"   >{{ $item->medicine_category_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>  

                                        </div> 

                                                                                                              
                                    </div> <!--end 1 -->

                                    <div class="row"> <!-- Start 2st row -->
                                         

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Name En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="medicine_name_en" class="form-control" required
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Name Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="medicine_name_hin" class="form-control" required
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>    
                                        </div>

                                    </div> <!--end 2 -->

                                    <div class="row"> <!-- Start 3st row -->
                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Code <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="medicine_code" class="form-control" required
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="medicine_qty" class="form-control" required
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                       

                                    </div> <!--end 3 -->



                                    <div class="row"> <!-- Start 5st row -->
                                        

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="medicine_selling_price" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="medicine_discount_price" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div> <!--end 5 -->

                                    <div class="row">
                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Tags En <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="medicine_tags_en" class="form-control"  value=""   data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Tags Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="text" name="medicine_tags_hin" class="form-control"  value=""   data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="row"> <!-- Start 6st row -->
                                        

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="file" accept="image/*" name="medicine_thumbnail" class="form-control" onChange="mainThamUrl(this)"   required="" >                                                                           
                                                    <img src="" class="my-1" id="mainThumb">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Multipale Images <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" accept="image/*" name="multi_image[]" id="multiImg" class="form-control" required=""  multiple=""> 
                                                    <div class="help-block"></div>
                                                </div>
                                                <div class="row my-2" id="preview_img">

                                                </div>
                                            </div>
                                        </div>

                                    </div> <!--end 6 -->

                                    <div class="row"> <!-- Start 7st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea  name="medicine_short_descp_en" id="textarea" class="form-control" required  data-validation-required-message="This field is required"></textarea>   
                                                <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <textarea  name="medicine_short_descp_hin" id="textarea" class="form-control" required  data-validation-required-message="This field is required"></textarea> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>   
                                        </div>

                                    </div> <!--end 7 -->

                                    <div class="row"> <!-- Start 8t row -->
                                        <div class="col-md 6">
                                            <div class="box">
                                                <div class="box-header">
                                                  <h5>Long Description English <span class="text-danger">*</span></h5>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                        <textarea id="editor1" class="form-control" placeholder="Long Description English" name="medicine_long_descp_en" required="" rows="10" cols="80"></textarea>  
                                                                                                        
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
                                                        <textarea id="editor2" class="form-control" placeholder="Long Description Hindi" name="medicine_long_descp_hin" required="" rows="10" cols="80"> </textarea>                                            
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                    </div> <!--end 8 -->
                                                                 
                                </div>
                            </div>

                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                       
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="medicine_hot_deals"  value="1">
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="medicine_featured" value="1">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_6" name="medicine_px"  value="1">
                                                <label for="checkbox_6">Px</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4"  name="medicine_special_offer" value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="medicine_special_deals" value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-primary mb-5 " value="Add Product" >                                       
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
</div>



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