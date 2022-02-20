@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<section class="content">
    <div class="row">
              
        <div class="col-6">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Edit State </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           
                <form method="post" action="{{ route('state.update') }}"  >
                    @csrf

                   
                    <input    name="id" type= "hidden" class="form-control"    value="{{$state->id}}">

                    <div class="row">
                        <div class="col-12">                                   

                        
                                     <div class="form-group">
                                        <h5>Select Division  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                                <select name="division_id" id="select"    class="form-control" aria-invalid="false">
                                                    <option value="" >Select  Division</option>
                                                    @foreach($divisions as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $state->division_id ? 'selected' : '' }}> {{ $item->division_name }}</option>
                                                    @endforeach()
                                                </select>
                                        <div class="help-block"></div>
                                        @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Select District  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                                <select name="district_id"     class="form-control" aria-invalid="false">
                                                    <option value="" selected="" disable="" >Select District</option>                                                               
                                              
                                                 @foreach($districts as $sitem)
                                                        <option value="{{ $sitem->id }}" {{ $sitem->id == $state->district_id ? 'selected' : '' }}> {{ $sitem->district_name }}</option>
                                                 @endforeach()  
                                                 </select>
                                                 @error('district_id')
                                                 <span class="text-danger">{{ $message }}</span>
                                             @enderror
                                        <div class="help-block"></div></div>
                                    </div>


                                    <div class="form-group">
                                        <h5> State Name  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="state_name" class="form-control"    value="{{$state->state_name}}">
                                            @error('state_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                              
                                    
                                                                                                                    
                            <div class="text-xs-right">
                            <input type="submit" class="btn btn-success mb-5 " value="Update State" >
                           
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
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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