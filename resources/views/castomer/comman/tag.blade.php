    <div class="col-xl-3 col-lg-4 col-md-5">
        <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Catgories</h4>
                <ul class="list cat-list">

                    @php
                       $categorys = App\Models\Category::orderBy('category_name_en', 'ASC')->get(); 
                    @endphp
                    @foreach ($categorys as $category)
                        <li >
                            <a href="{{url('/product/categorywise/'.$category->id.'/'.$category->category_slug_en)}}" class="d-flex justify-content-between">
                                <p style=" {{($category->id == $title->id) ? 'color: blue;' : '' }}  "> @if(session()->get('language') == 'hindi')  {{$category->category_name_hin}}  @else  {{$category->category_name_en}} @endif</p>
                            </a>
                        </li>
                    @endforeach                    
                </ul>
                <div class="br"></div>
            </aside>

            <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Catgories</h4>
                <ul class="list cat-list">

                   
                    @foreach ($subcat as $subcategory)
                        <li >
                            <a href="{{url('/product/subcategorywise/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}" class="d-flex justify-content-between">
                                <p style=" {{($subcategory->id == $title->subcategory_id) ? 'color: blue;' : '' }}  "> @if(session()->get('language') == 'hindi')  {{$subcategory->subcategory_name_hin}}  @else  {{$subcategory->subcategory_name_en}} @endif</p>
                            </a>
                        </li>
                    @endforeach                    
                </ul>
                <div class="br"></div>
            </aside>



            <aside class="single-sidebar-widget tag_cloud_widget">
                <h4 class="widget_title">Tag Clouds</h4>
                <ul class="list">
                    @php
                        $tag_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
                        $tag_hin = App\Models\Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();

                    @endphp
                     @if(session()->get('language') == 'hindi') 
                            @foreach ($tag_hin as $tag )
                                @php
                                 $tags = (explode(",",$tag->product_tags_hin));
                                @endphp
                                @foreach ($tags as $tag_name)
                                    <li>
                                        <a href="#">{{$tag_name}}</a>
                                    </li>   
                                @endforeach
                            @endforeach
                    @else 
                            @foreach ($tag_en as $tag )

                                @php
                                    $tags = (explode(",",$tag->product_tags_en));
                                @endphp

                                @foreach ($tags as $tag_name)
                                        <li>
                                            <a href="#">{{$tag_name}}</a>
                                        </li>   
                                @endforeach

                            @endforeach                             
                    @endif





                    
                   
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
                                <h3> @if(session()->get('language') == 'hindi')  {{$item->product_name_hin}}  @else {{$item->product_name_en}} @endif </h3>
                            </a>
                            
                        </div>
                    </div>
                @endforeach                                               
                <div class="br"></div>
            </aside>

        </div>



          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand"><label for="men">Men<span> (3600)</span></label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Women<span> (3600)</span></label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="accessories" name="brand"><label for="accessories">Accessories<span> (3600)</span></label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="footwear" name="brand"><label for="footwear">Footwear<span> (3600)</span></label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="bayItem" name="brand"><label for="bayItem">Bay item<span> (3600)</span></label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="electronics" name="brand"><label for="electronics">Electronics<span> (3600)</span></label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="food" name="brand"><label for="food">Food<span> (3600)</span></label></li>
                  </ul>
                </form>
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">Product Filters</div>
            <div class="common-filter">
              <div class="head">Brands</div>
              <form action="#">
                <ul>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Color</div>
              <form action="#">
                <ul>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                      Leather<span>(29)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                      with red<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Price</div>
              <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                  <div class="price">Price:</div>
                  <span>$</span>
                  <div id="lower-value"></div>
                  <div class="to">to</div>
                  <span>$</span>
                  <div id="upper-value"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget search_widget">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Posts">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="lnr lnr-magnifier"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
                <div class="br"></div>
            </aside>
{{-- ============================ --}}

            <aside class="single_sidebar_widget author_widget">
                <div class="btn-group">
                    
                    <a class="btn btn-secondary btn-sm" href="{{url('/')}}">  </a>
                   
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                  </div>        
            
            </aside>

           
            <aside class="single-sidebar-widget newsletter_widget">
                <h4 class="widget_title">Newsletter</h4>
                <p>
                    Here, I focus on a range of items and features that we use in life without giving them a second thought.
                </p>
                <div class="form-group d-flex flex-row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email'">
                    </div>
                    <a href="#" class="bbtns">Subcribe</a>
                </div>
                <p class="text-bottom">You can unsubscribe at any time</p>
                <div class="br"></div>
            </aside>
            
          </div>
        </div>