  <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                        	@foreach(App\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
                            <li><a href="{{route('categories.show',$parent->id)}}">{{$parent->name}}</a></li>

                            @endforeach 
                            
                        </ul>
                    </div> 
                    


<!-- <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                        	@foreach(App\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
                            <li><a href="main-{{ $parent->id }}" data-toggle="collapse">{{$parent->name}}</a>

                            <div class="collapse" id="main-{{ $parent->id }}">
                            <a href="">pps</a>



                            </div>


                            </li>

                            @endforeach 
                            
                        </ul>
                    </div>  --> 