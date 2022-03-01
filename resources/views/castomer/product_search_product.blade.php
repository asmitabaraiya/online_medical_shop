

<style>
	
    body {
        background-color: #eee
    }
    .card {
        background-color: #fff;
        padding: 15px;
        border: none
    }
    .input-box {
        position: relative
    }
    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }
    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }
    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }
    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center
    }
    .border-bottom {
        border-bottom: 2px solid #eee
    }
    .list i {
        font-size: 19px;
        color: red
    }
    .list small {
        color: black
    }
    </style>
    
    @if($products -> isEmpty())
    <h3 class="text-center text-danger">Product Not Found </h3>
    
    @else
     
    
    <div class="container-fluied">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    
    
                @foreach($products as $item)
       <a href="{{url('product/detail/'.$item->id.'/'.$item->product_slug_en)}}">
                    <div class="list border-bottom">  <img src="{{ asset($item->product_thumbnail) }}" style="width: 50px; height: 50px;"> 
                        
       <div class="d-flex flex-column ml-3" style="margin-left: 10px;"> <span>{{ $item->product_name_en }} </span> </div>
                    </div>
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    
    @endif