<div class="product-list">
                        <div class="row">
                         @foreach ($related_product as $related_product)
                            <div class="col-lg-4 col-sm-6">
                                
                                <div class="product-item">
                                    
                            <div class="pi-pic">
                                <!-- <img src="img/products/women-1.jpg" alt=""> -->
                                
                                   
                                         @php $i=1; @endphp

                                    @foreach ($related_product->images as $image)

                                    @if ($i>0)

                                    <a href="{{ route('products.show',$related_product->slug) }}"><img src="{{asset('img/test/'.$image->image)}}" alt="product"></a>
                                    @endif

                                    @php $i-- @endphp

                               @endforeach
                                  
                                    
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            
                            <div class="pi-text">
                                <div class="catagory-name">{{$related_product->category->name}}</div>
                                <a href="{{ route('products.show',$product->slug) }}">
                                    <h5>{{$related_product->title}}</h5>
                                </a>
                                <div class="product-price">
                                    
                                    BDT{{$related_product->offer_price}}
                                    <span>BDT{{$related_product->price}}</span>
                                </div>
                            </div>
                            
                        </div>
                        
                            </div>
                            @endforeach
                         
                            
                        </div>
                    </div>