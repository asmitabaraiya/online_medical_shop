    <div class="col-xl-3 col-lg-4 col-md-5">
        <div class="blog_right_sidebar">

            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Catgories</h4>
                @php
                $categorys = App\Models\Category::orderBy('category_name_en', 'ASC')->get(); 
             @endphp
                <ul class="main-categories">
                  <li class="common-filter">
                    <form action="{{route('shope.filter')}}" method="post">
                        @csrf
                      <ul>
                        @foreach ($categorys as $category)
                        <li class="filter-list"><input class="pixel-radio" type="checkbox" onchange="this.form.submit()" name="category" value="{{$category->category_slug_en}}" id="men" name="brand"><label for="men">{{$category->category_name_en}}</label></li>
                        @endforeach    
                    </ul>
                    </form>
                  </li>
                </ul>
                <div class="br"></div>
            </aside>



            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Sub Catgories</h4>
                <ul class="main-categories">

                   
                    @foreach ($subcat as $subcategory)
                    <li class="filter-list"><input class="pixel-radio" type="checkbox" id="men" name="brand"><label for="men">{{$subcategory->subcategory_name_en}} </label></li>
                        
                    @endforeach                    
                </ul>
                <div class="br"></div>
            </aside>


            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Sub Category</h4>
                <ul class="main-categories">

                   
                    @foreach ($subcat as $subcategory)
                    <li class="filter-list"><input class="pixel-radio" type="checkbox" id="men" name="brand"><label for="men">{{$subcategory->subcategory_name_en}} </label></li>
                        
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



        