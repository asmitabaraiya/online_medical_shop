    <div class="col-xl-3 col-lg-4 col-md-5">
        <div class="blog_right_sidebar">

            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Categories</h4>
                @php
                $categorys = App\Models\SubCategory::orderBy('subcategory_name_en', 'ASC')->where('category_id' , $title->id )->get(); 
             @endphp
                <ul class="main-categories">
                  <li class="common-filter">
                    
                      <ul>
                        @foreach ($categorys as $category)
                        <li class="filter-list"><a href="{{url('filter-subcategory/'.$category->category_id.'/'.$category->id)}}"> 
                           
                           @if (isset($titleSubCat))
                                @if ($titleSubCat->id ==  $category->id)
                                    <i class="fas fa-circle"></i>
                                @else
                                    <i class="far fa-circle"></i>                                  
                                @endif   
                           @else
                                 <i class="far fa-circle"></i>    
                           @endif
                               
                           
                            <label for="men">  {{$category->subcategory_name_en}}</label></a>
                        </li>
                        @endforeach    
                    </ul>
                  
                  </li>
                </ul>
                <div class="br"></div>
                
            </aside>


            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Sub Categories</h4>
                <ul class="main-categories">
              
                
                    
                  

                    @foreach ($subsubCat as $subcategory)
                        <li class="filter-list"><a href="{{url('filter-subsubcategory/'.$subcategory->category_id.'/'.$subcategory->subcategory_id.'/'.$subcategory->id)}}"> 
                           
                           @if (isset($titleSubSubCat))
                                @if ($titleSubSubCat->id ==  $subcategory->id)
                                    <i class="fas fa-circle"></i>
                                @else
                                    <i class="far fa-circle"></i>                                  
                                @endif   
                           @else
                                 <i class="far fa-circle"></i>    
                           @endif
                               
                           
                            <label for="men">  {{$subcategory->subsubcategory_name_en}}</label></a>
                        </li>
                       
                        
                    @endforeach                    
                
                </ul>
                <div class="br"></div>
            </aside>



          

            <aside class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title">Hot Deals</h3>
                @php
                    $hot_deals = App\Models\Product::where('status' , 1)->where('hot_deals' , 1)->orderBy('id' , 'DESC')->limit(4)->get();
                @endphp
                @foreach ( $hot_deals as $item )
                    <div class="media post_item">
                        <img height="70px" width="70px" src="{{asset($item->product_thumbnail)}}" alt="post">
                        <div class="media-body">
                            <a  href="{{ url('product/detail/'.$item->id.'/'.$item->product_slug_en  )}}">
                                <p style="color: black">{{$item->product_name_en}}  </p>
                            </a>
                            
                        </div>
                    </div>
                @endforeach                                               
                <div class="br"></div>
            </aside>

        </div>



          
        </div>



        