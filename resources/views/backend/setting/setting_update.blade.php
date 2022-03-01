@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Site Settings</h3>
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

    <div class="col-md-12 col-12">
        <div class="box box-outline-info">
        <div class="box-header">
            <h4 class="box-title"><strong>Site Setting</strong></h4>
            <div class="box-tools pull-right">					
                <ul class="box-controls">
                
                </ul>
            </div>
        </div>

        <div class="box-body">
            
            <form method="post" action="{{route('settings.store')}}" enctype="multipart/form-data" >
                @csrf
                <input type= "hidden"  name="old_image" class="form-control" required="" value="{{$setting->logo}}">

                <div class="row">
                    <div class="col-6">                                                                   
                                <div class="form-group">
                                    <h5> Company Name  </h5>
                                    <div class="controls">
                                        <input type="text"  name="company_name" class="form-control" value="{{$setting->company_name}}" >
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-6">                                                                   
                        <div class="form-group">
                            <h5> Company Email   </h5>
                            <div class="controls">
                                <input type="text"  name="email" class="form-control"  value="{{$setting->email}}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                               
                </div> 
                <div class="row">
                    <div class="col-6">                                                                   
                                <div class="form-group">
                                    <h5> Company Phone No 1  </h5>
                                    <div class="controls">
                                        <input type="text"  name="phone_one" class="form-control" value="{{$setting->phone_one}}" >
                                        @error('phone_one')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-6">                                                                   
                        <div class="form-group">
                            <h5> Company Phone No 2  </h5>
                            <div class="controls">
                                <input type="text"  name="phone_two" class="form-control" value="{{$setting->phone_two}}"  >
                                @error('phone_two')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                               
                </div> 
                <div class="row">
                    <div class="col-6">                                                                   
                                <div class="form-group">
                                    <h5> Company Address  </h5>
                                    <div class="controls"> 
                                        <textarea  name="company_address" rows="6" id="textarea" class="form-control"     >{{$setting->company_address}}</textarea> 
                                        
                                        @error('company_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-6">                                                                   
                        <div class="form-group">
                            <h5> Company Logo  </h5>
                            <div class="controls">
                                <input type="file" accept="image/*" name="logo" class="form-control" onChange="mainThamUrl(this)"      >                                                                           
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img src="{{asset($setting->logo)}}" style="width: 139px; height:36px;"  class="my-1" id="mainThumb">
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                               
                </div> 
                
                <div class="row">
                    <div class="col-6">                                                                   
                                <div class="form-group">
                                    <h5> Facebook URL  </h5>
                                    <div class="controls">
                                        <input type="text"  name="facebook" class="form-control" value="{{$setting->facebook}}"  >
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-6">                                                                   
                        <div class="form-group">
                            <h5> Twitter URL  </h5>
                            <div class="controls">
                                <input type="text"  name="twitter" class="form-control" value="{{$setting->twitter}}" >
                                @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                               
                </div> 

                <div class="row">
                    <div class="col-6">                                                                   
                                <div class="form-group">
                                    <h5> YouTube URL  </h5>
                                    <div class="controls">
                                        <input type="text"  name="youtube" class="form-control" value="{{$setting->youtube}}" >
                                        @error('youtube')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                    </div>

                    <div class="col-6">                                                                   
                        <div class="form-group">
                            <h5> Linkedin URL  </h5>
                            <div class="controls">
                                <input type="text"  name="linkedin" class="form-control" value="{{$setting->linkedin}}"  >
                                @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                               
                </div> 
                
                <button type="submit" class="btn btn-rounded btn-warning ">
                    <i class="ti-save-alt"></i> Save
                  </button>
                  
                    </div>
                </div>
    </form>
        </div>
        </div>
    </div>
</section>



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

    document.getElementBuId("address").value = "";
</script>

@endsection





