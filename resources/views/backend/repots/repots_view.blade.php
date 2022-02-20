@extends('admin.admin_master')
@section('admin')



<section class="content">
    <div class="row">
       
        
        <div class="col-4">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Search By Date </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('search-by-name')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Select Date <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="date"  name="date" class="form-control"  >
                                                        @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>                                                                                                                                                                               
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Search" >                                       
                                        </div>
                                    </div>
                                </div>
                    </form>
            </div>
            <!-- /.box-body -->
            </div>
        </div>


        <div class="col-4">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Search By Month </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('search-by-month')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Select Month <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="month" id="select"    class="form-control" aria-invalid="false">
                                                            <option value="">Select  Month</option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="Nevember">Nevember</option>
                                                            <option value="December">December</option>
                                                        </select>

                                                        @error('month')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5> Select Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year" id="select"    class="form-control" aria-invalid="false">
                                                            <option value="">Select  Year</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            
                                                        </select>
                                                        @error('year')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                              
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Search" >
                                       
                                        </div>
                                    </div>
                                </div>
                    </form>
               
            </div>
            <!-- /.box-body -->
            </div>
        </div>


        <div class="col-4">
            <div class="box">
            <div class="box-header with-border margin-top-10">
                <h3 class="box-title">Search By Year </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <form method="post" action="{{route('search-by-year')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">                                   
                                                <!-- name=========================================================-->
                                                <div class="form-group">
                                                    <h5> Select Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="year" id="select"    class="form-control" aria-invalid="false">
                                                            <option value="">Select  Year</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            
                                                        </select>
                                                        @error('year')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                              
                                                                                                                                
                                        <div class="text-xs-right">
                                        <input type="submit" class="btn btn-success mb-5 " value="Search" >
                                       
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


@endsection