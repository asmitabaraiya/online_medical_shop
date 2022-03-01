@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">SEO Settings</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>                          
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="content" >

    <div class="col-md-6 col-12">
        <div class="box box-outline-info">
            <div class="box-header">
                <h4 class="box-title"><strong>Site Setting</strong></h4>
                <div class="box-tools pull-right">					
                    <ul class="box-controls">
                    
                    </ul>
                </div>
            </div>

        <div class="box-body">
            
            <form method="POST" action="{{route('seo.store')}}"  >
                @csrf

             <input type= "hidden"  name="id" class="form-control"  value="{{$seo->id}}" >
                    <div class="col-12">                                                                   
                                <div class="form-group">
                                    <h5>Meta Title </h5>
                                    <div class="controls">
                                        <input type="text"  name="meta_title" class="form-control" value="{{$seo->meta_title}}" >
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-12">                                                                   
                        <div class="form-group">
                            <h5> Meta Author</h5>
                            <div class="controls">
                                <input type="text"  name="meta_author" class="form-control"  value="{{$seo->meta_author}}">
                                @error('meta_author')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                               
               
                    <div class="col-12">                                                                   
                        <div class="form-group">
                            <h5> Meta Keyword</h5>
                            <div class="controls">
                                <input type="text"  name="meta_keyword" class="form-control"  value="{{$seo->meta_keyword}}">
                                @error('meta_keyword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
               


                    <div class="col-12">                                                                   
                                <div class="form-group">
                                    <h5> Meta Description</h5>
                                    <div class="controls">
                                        <textarea  name="meta_description" rows="6" class="form-control">{{$seo->meta_keyword}}</textarea> 
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div> 
                    
                    

                    <div class="col-12">                                                                   
                        <div class="form-group">
                            <h5> Meta Analytics </h5>
                            <div class="controls">
                                <textarea  name="google_analytics" rows="6" class="form-control">{{$seo->google_analytics}}</textarea> 
                                @error('google_analytics')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div> 

                 

              
                
                    <input type="submit" class="btn btn-rounded btn-warning " 
                    value="Save"  >
                  
                    
            </form>
        </div>
        </div>
    
</section>




@endsection





