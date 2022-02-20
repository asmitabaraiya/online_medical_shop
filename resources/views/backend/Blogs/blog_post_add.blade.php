@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        
                        <form method="post" action="{{route('blog.post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row"> <!-- Start 1st row -->
                                      

                                        <div class="col-md 4"> 
                                                    <div class="form-group">
                                                        <h5> Blog Category  <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                                <select name="category_id" id="select"    class="form-control" aria-invalid="false">
                                                                    <option value="" >Select  Category</option>
                                                                   @foreach ($blogcategory as $item)
                                                                        <option value="{{$item->id}}" >{{$item->blog_category_name_en}}</option>
                                                                   @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        <div class="help-block"></div></div>
                                                    </div>  

                                        </div> 
                                                                          
                                    </div> <!--end 1 -->


                                    

                                    <div class="row"> <!-- Start 4st row -->

                                        <div class="col-md 6"> 
                                            <div class="form-group">
                                                <h5>Blog Post Title En <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text"  name="poast_title_en" class="form-control" >
                                                    @error('poast_title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>                

                                        <div class="col-md 6">
                                        <div class="form-group">
                                            <h5>Blog Post Title Hin <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text"  name="poast_title_hin" class="form-control"  >
                                                @error('poast_title_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        </div>
                                      

                                    </div> <!--end 4 -->

                                    
                                    

                                    <div class="row"> <!-- Start 6st row -->
                                     

                                        <div class="col-md 4">
                                            <div class="form-group">
                                                <h5>Blog Post Image <span class="text-danger">*</span></h5>
                                                <div class="controls">     
                                                    <input type="file" accept="image/*" name="post_image" class="form-control" onChange="mainThamUrl(this)"      >                                                                           
                                                    @error('post_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                    <img src="" class="my-1" id="mainThumb">
                                                </div>
                                            </div>
                                        </div>

                                    

                                    </div> <!--end 6 -->


                                    <div class="row"> <!-- Start 8t row -->
                                        <div class="col-md 6">
                                            <div class="box">
                                                <div class="box-header">
                                                  <h5>Long Description English</h5>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                        <textarea id="editor1" class="form-control" placeholder="Long Description English" name="poast_details_en"    rows="10" cols="80"></textarea>  
                                                                                                        
                                                </div>
                                                @error('poast_details_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                        <div class="col-md 6">
                                            <div class="box">
                                                <div class="box-header">
                                                  <h5>Long Description Hindi </h5>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">                                                   
                                                        <textarea id="editor2" class="form-control" placeholder="Long Description Hindi" name="poast_details_hin"    rows="10" cols="80"> </textarea>                                            
                                                </div>
                                                @error('poast_details_hin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                    </div> <!--end 8 -->
                                                                 
                                </div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-success mb-5 " value="Edit Blog Post" >                                       
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

@endsection