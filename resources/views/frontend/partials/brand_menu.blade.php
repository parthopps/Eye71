<div class="filter-widget">
                        <h4 class="fw-title">Brands</h4>
                        <ul class="filter-catagories">
                            @foreach(App\Brand::orderby('id','asc')->get() as $brand)
                            <li><a href="{{route('brand.show',$brand->id)}}">{{$brand->name}}</a></li>

                            @endforeach 
                            
                        </ul>
                    </div> 