@extends('admin.admin_master')
@section('admin')


<div class="container-full">


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title"> Medicine Preview</h4>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                       
                            
                            <div class="row">
                                <div class="col-12">

                                    <div class="row"> <!-- Start 1st row -->
                                        <div class="col-md 4"> 
                                            <div class="form-group">
                                                        <h5> Brand  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select  id="select" required=""  class="form-control" aria-invalid="false" disabled>
                                                                    <option value="" >Select  Brand</option>
                                                                    @foreach($brand as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $medicine->brand_id ? 'selected' : '' }} >{{ $item->brand_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>            
                                        </div> 

                                        <div class="col-md 4"> 
                                                    <div class="form-group">
                                                        <h5>Medicine Category  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select  id="select" required="" class="form-control" aria-invalid="false" disabled>
                                                                    <option value="" >Select Medicine  Category</option>
                                                                    @foreach($medicinCategory as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $medicine->medicine_category_id ? 'selected' : '' }} > {{ $item->medicine_category_name_en }}</option>
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
                                                    <input  disabled type="text"  class="form-control" required value="{{$medicine->medicine_name_en}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Name Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input disabled type="text"  class="form-control" required  value="{{$medicine->medicine_name_hin}}"
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
                                                    <input disabled type="text"  class="form-control" required   value="{{$medicine->medicine_code}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Medicine Quantity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input disabled type="text"  class="form-control" required  value="{{$medicine->medicine_qty}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div> <!--end 3 -->

                                    <div class="row"> <!-- Start 4st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Medicine Tags En <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input disabled  type="text"  class="form-control"  value="{{$medicine->medicine_tags_en}}"   data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Medicine Tags Hin <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input disabled  type="text"  class="form-control"  value="{{$medicine->medicine_tags_hin}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                    
                                    <div class="row">  <!-- Start 7st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Medicine Selling Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input disabled type="text"  class="form-control" required="" value="{{$medicine->medicine_selling_price}}"  data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Medicine Discount Price <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input disabled type="text"  class="form-control" required="" value="{{$medicine->medicine_discount_price}}" data-validation-required-message="This field is required" aria-invalid="false"> 
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
                                                    <textarea   id="textarea" class="form-control"   required  data-validation-required-message="This field is required"> {{$medicine->medicine_short_descp_en}} </textarea>   
                                                <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <textarea   id="textarea" class="form-control"  required  data-validation-required-message="This field is required"> {{$medicine->medicine_short_descp_hin}} </textarea> 
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
                                                        <textarea disabled id="editor1" class="form-control" placeholder="Long Description English"   required="" rows="10" cols="80"> {{$medicine->medicine_long_descp_en}} </textarea>  
                                                                                                        
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
                                                        <textarea disabled id="editor2" class="form-control" placeholder="Long Description Hindi"  required="" rows="10" cols="80"> {{$medicine->medicine_long_descp_hin}}</textarea>                                            
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
                                                <input disabled type="checkbox" id="checkbox_2" name="hot_deals"  value="1" {{ $medicine->medicine_hot_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_3" name="featured" value="1" {{ $medicine->medicine_featured == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_6" name="medicine_px"  value="1"  {{ $medicine->medicine_px == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_6">Px</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <div class="controls">
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_4"  name="special_offer" value="1" {{ $medicine->medicine_special_offer == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $medicine->medicine_special_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                     
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

                                 
<div class="row">
    <div class="col-md-6">
          <!-- Multiple Image update area -->
          <section class="content">
        
                            <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Medicine Multipe Image </h4>
                    </div>
                   

                        <div class="row row-sm">
                            @foreach($multiImg as $img)
                                <div class="col-md-3">
                                    <div class="card my-2" >
                                        <img src="{{asset($img->photo_name)}}" class="card-img-top mx-2" style="heigth: 100px; width: 100px;" >
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        
                   
				</div>
            
    </section>

    </div>



    <div class="col-md-6">
    <!-- Main thamnail Image -->

    <section class="content">
                    
                            <div class="box bt-3 border-info">
                                <div class="box-header">
                                    <h4 class="box-title">Medicine Thumbnail Image </h4>
                                </div>
                                


                                    <div class="row row-sm">
                                            
                                            <div class="col-md-3">
                                                <div class="card my-2" >
                                                    <img src="{{asset($medicine->medicine_thumbnail)}}"  class="card-img-top mx-2" style="heigth: 100px; width: 100px;" >
                                                   
                                                   
                                                </div>
                                            </div>
                                      
                                    </div>

                                   
                               
                            </div>
                     
             </section> 

    </div>
</div>                                  

  

                        
</div>







@endsection


