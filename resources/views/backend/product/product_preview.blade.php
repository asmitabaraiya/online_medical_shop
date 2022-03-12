@extends('admin.admin_master')
@section('admin')


<div class="container-full">


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title"> Product Preview</h4>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                       
                            
                            <div class="row">
                                <div class="col-12">

                                    <div class="row"> <!-- Start 1st row -->
                                        <div class="col-md 6"> 
                                            <div class="form-group">
                                                        <h5> Brand    </h5>
                                                        <div class="controls">
                                                                <select name="brand_id" id="select" required=""  class="form-control" aria-invalid="false" disabled>
                                                                    <option value="" >Select  Brand</option>
                                                                    @foreach($brand as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->brand_id ? 'selected' : '' }} >{{ $item->brand_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>            
                                        </div> 

                                        <div class="col-md 6"> 
                                                    <div class="form-group">
                                                        <h5> Category    </h5>
                                                        <div class="controls">
                                                                <select name="category_id" id="select" required="" class="form-control" aria-invalid="false" disabled>
                                                                    <option value="" >Select  Category</option>
                                                                    @foreach($category as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->category_id ? 'selected' : '' }} >{{ $item->category_name_en }}</option>
                                                                    @endforeach()
                                                                </select>
                                                        <div class="help-block"></div></div>
                                                    </div>  

                                        </div> 

                                                                                                                
                                    </div> <!--end 1 -->

                                    <div class="row"> <!-- Start 2st row -->
                                        <div class="col-md 6"> 
                                            <div class="form-group">
                                                <h5> SubCategory    </h5>
                                                <div class="controls">
                                                        <select name="subcategory_id" id="select" required="" class="form-control" aria-invalid="false" disabled>
                                                        <option value="" selected="" disable="" >Select SubCategory</option>
                                                            @foreach($subcategory as $item)
                                                                <option value="{{ $item->id }}"  {{ $item->id == $product->subcategory_id ? 'selected' : '' }} >{{ $item->subcategory_name_en }}</option>
                                                            @endforeach()
                                                        
                                                        </select>
                                                <div class="help-block"></div></div>
                                            </div> 
                                        </div>   

                                        <div class="col-md 6"> 
                                            <div class="form-group">
                                                <h5>Sub - SubCategory    </h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" id="select" required="" class="form-control" aria-invalid="false" disabled>
                                                            <option value="" selected="" disable="" >Select SubSubCategory</option>  
                                                                    @foreach($subsubcategory as $item)
                                                                        <option value="{{ $item->id }}"  {{ $item->id == $product->subsubcategory_id ? 'selected' : '' }} >{{ $item->subsubcategory_name_en }}</option>
                                                                    @endforeach()                                                           
                                                        </select>
                                                    <div class="help-block"></div></div>
                                            </div> 
                                        </div>  

                                       

                                       

                                    </div> <!--end 2 -->

                                    <div class="row"> <!-- Start 3st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Name   </h5>
                                                <div class="controls">
                                                    <input  disabled type="text" name="product_name_en" class="form-control" required value="{{$product->product_name_en}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Code   </h5>
                                                <div class="controls">
                                                    <input disabled type="text" name="product_code" class="form-control" required   value="{{$product->product_code}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                       
                                    
                                    </div> <!--end 3 -->

                                    

                                    <div class="row"> <!-- Start 5st row -->
                                        

                                       

                                       

                                    </div> <!--end 4 -->

                                    <div class="row"> <!-- Start 6st row -->
                                        <div class="col-md 6">
                                            <div class="form-group">
                                                <h5>Product Size  </h5>
                                                <div class="controls">     
                                                    <input disabled type="text" name="product_size_en" class="form-control"  value="{{$product->product_size_en}}" required=""  data-role="tagsinput"  >                                       
                                        
                                                </div>
                                            </div>
                                        </div>

                                        

                                                                              

                                    </div> <!--end 6 -->
                                    
                                    <div class="row">  <!-- Start 7st row -->
                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Quantity   </h5>
                                                <div class="controls">
                                                    <input disabled type="text" name="product_qty" class="form-control" required  value="{{$product->product_qty}}"
                                                        data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Selling Price   </h5>
                                                <div class="controls">
                                                    <input disabled type="text" name="selling_price" class="form-control" required="" value="{{$product->selling_price}}"  data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Product Discount Price   </h5>
                                                <div class="controls">
                                                    <input disabled type="text" name="discount_price" class="form-control" required="" value="{{$product->discount_price}}" data-validation-required-message="This field is required" aria-invalid="false"> 
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   

                                    <div class="row"> <!-- Start 9st row -->
                                        <div class="col-md 12">
                                            <div class="form-group">
                                                <h5>Short Description    </h5>
                                                <div class="controls">
                                                    <textarea  name="short_descp_en" id="textarea" class="form-control"   required  data-validation-required-message="This field is required"> {{$product->short_descp_en}} </textarea>   
                                                <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>

                                      

                                    </div> <!--end 9 -->

                                    <div class="row"> <!-- Start 10t row -->
                                        <div class="col-md 12">
                                            <div class="box">
                                                <div class="box-header">
                                                  <h5>Long Description    </h5>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                        <textarea disabled id="editor1" class="form-control" placeholder="Long Description English" name="long_descp_en"  required="" rows="10" cols="80"> {{$product->long_descp_en}} </textarea>  
                                                                                                        
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
                                             <div>
                                                 <p>Admin Can put product which needed PX.</p>
                                             </div>
                                             <fieldset>
                                                 <input disabled type="checkbox" id="checkbox_6" name="px" value="1" {{ $product->px == 1 ? 'checked' : ''}}>
                                                 <label for="checkbox_6">PX </label>
                                             </fieldset>
                                            
                                         </div>
                                     </div>
                                 </div>
                            
                             </div>

                             <hr>

                            <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                       
                                        <div class="controls">
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_2" name="hot_deals"  value="1" {{ $product->hot_deals == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <div class="controls">
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_4"  name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked' : ''}}>
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input disabled type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : ''}}>
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
                        <h4 class="box-title">Product Multiple Image </h4>
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
                                    <h4 class="box-title">Product Thumbnail Image </h4>
                                </div>
                                


                                    <div class="row row-sm">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                                            
                                            <div class="col-md-3">
                                                <div class="card my-2" >
                                                    <img src="{{asset($product->product_thumbnail)}}"  class="card-img-top mx-2" style="heigth: 100px; width: 100px;" >
                                                   
                                                   
                                                </div>
                                            </div>
                                      
                                    </div>

                                   
                               
                            </div>
                     
             </section> 

    </div>
</div>                                  

  

                        
</div>







@endsection


