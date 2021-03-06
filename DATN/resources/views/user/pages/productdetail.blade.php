@section('title'){{$dtPro->product_name}} - 2001 @endsection
@extends('user.app')
@section('content')
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="/shop">Shop</a></li>
                    <li class="active">Single Product</li>
                </ol>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-5">
                <div class="single-product-slider">
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-outer'>
                            <!-- me art lab slider -->
                            <div class='carousel-inner '>
                                <div class='item active'>

                                    <img src='{{asset($dtPro->image)}}' alt='' data-zoom-image="{{$dtPro->image}}" />
                                </div>
                                @foreach($dtProP as $ProP)
                                <div class='item'>

                                    <img src='{{asset($ProP->image)}}' alt='' data-zoom-image="{{$ProP->image}}" />
                                </div>
                                @endforeach


                            </div>

                            <!-- sag sol -->
                            <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                <i class="tf-ion-ios-arrow-left"></i>
                            </a>
                            <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                <i class="tf-ion-ios-arrow-right"></i>
                            </a>
                        </div>

                        <!-- thumb -->
                        <ol class='carousel-indicators mCustomScrollbar meartlab'>
                            <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                                <img src='{{asset($dtPro->image)}}' alt='' />
                            </li>
                            @php $i=1; @endphp
                            @foreach($dtProP as $ProP)
                            <li data-target='#carousel-custom' data-slide-to='{{$i++}}'>
                                <img src='{{asset($ProP->image)}}' alt='' />
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form action="{{ route('user.cart.post',['id'=>$dtPro->id]) }}" method="post">
                    @csrf
                    <div class="single-product-details">
                        <h2>{{$dtPro->product_name}}</h2>
                        <p class="product-price">
                            @if($dtPro->discount!=0)
                        <ul>
                            <li style="display: inline-block;">
                                ${{number_format($dtPro->discount)}}
                            </li>
                            <li style="text-decoration: line-through;display: inline-block;">
                                ${{number_format($dtPro->price)}}
                            </li>
                        </ul>
                        @else
                        ${{number_format($dtPro->price)}}
                        @endif
                        </p>

                        <p class="product-description mt-20">
                            {{$dtPro->description}}
                        </p>
                        @php $sum=0; @endphp
                        @foreach($dtProD as $ProD)
                        @php $sum+=$ProD->amount; @endphp
                        @endforeach
                        @if($sum>0)
                        <div class="product-size">
                            <span>Size:</span>
                            <select class="form-control" name="size">
                                @foreach($dtProD as $ProD)
                                @if($ProD->amount>0)
                                <option value="{{$ProD->id}}">{{$ProD->size}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="text" value="1" name="quantity" min="1" max="5">
                                <!-- <ul>
                                <li><a href="product-single.html">Out of stock</a></li>
                            </ul> -->
                            </div>
                        </div>
                        <div class="product-category">
                            <span>Product Type:</span>
                            <ul>
                                <li><a href="product-single.html">{{$dtProTid->product_type_name}}</a></li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-main mt-20">Add To Cart</button>
                        <a href="{{route('user.favourite.add',['id'=>$dtPro->id])}}" style="font-size: 12px;"
                            class="btn btn-main btn-solid-border mt-20"><i class="heart tf-ion-ios-heart-outline"></i>
                            Wishlist</a>
                        @else
                        <div>
                            <span style="font-size: 17px;font-weight:500">Out of stock</span>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabCommon mt-20">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                        @php $count=count($dtCm); @endphp
                        <li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Reviews ({{$count}})</a>
                        </li>
                    </ul>
                    <div class="tab-content patternbg">
                        <div id="details" class="tab-pane fade active in">
                            <h4>Product Description</h4>
                            <p>{{$dtPro->description}}</p>

                        </div>
                        <div id="reviews" class="tab-pane fade">
                            <div class="post-comments">
                                <ul class="media-list comments-list m-bot-50 clearlist">
                                    <!-- Comment Item start-->
                                    @foreach($dtCm as $cm)

                                    @if($cm->status == 1)
                                    <li class="media">
                                        <a class="pull-left" href="#!">
                                            <img class="media-object comment-avatar" src="{{asset($cm->avatar)}}" alt=""
                                                width="50" height="50" />
                                        </a>
                                        <div class="media-body">
                                            <div class="comment-info">
                                                <h4 class="comment-author">
                                                    <a href="#!">{{$cm->full_name}}</a>
                                                </h4>
                                                <time datetime="2013-04-06T13:53">{{$cm->date_time}}</time>
                                            </div>
                                            <p>
                                                {{$cm->comment}}
                                            </p>
                                        </div>
                                    </li>
                                    @else
                                    <li class="media">
                                        <a class="pull-left" href="#!">
                                            <img class="media-object comment-avatar" src="{{asset($cm->avatar)}}" alt=""
                                                width="50" height="50" />
                                        </a>
                                        <div class="media-body">
                                            <div class="comment-info">
                                                <h4 class="comment-author">
                                                    <a href="#!">{{$cm->full_name}}</a>
                                                </h4>
                                                <time datetime="2013-04-06T13:53">{{$cm->date_time}}</time>
                                            </div>
                                            <p>
                                                Comments awaiting moderation
                                            </p>
                                        </div>
                                    </li>
                                    @endif
                                    <!-- End Comment Item -->
                                    @endforeach



                                </ul>
                            </div>
                            @if (Auth::check())
                            <div class="post-comments-form">
                                <h3 class="post-sub-heading">Comments</h3>
                                <form method="post" action="{{route('comment',['id'=>$dtPro->id]) }}" id="form"
                                    role="form">
                                    @csrf
                                    <div class="row">
                                        <!-- Comment -->
                                        <div class="form-group col-md-12">
                                            <input type="hidden" name="account" value="{{Auth::user()->id}}">
                                            <textarea name="comment" id="text" class=" form-control" rows="6"
                                                placeholder="Comment" maxlength="400"></textarea>
                                        </div>
                                        <!-- Send Button -->
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-small btn-main ">
                                                Send comment
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @else
                            <div class="post-comments-form text-center">
                                <a href="/login" class="btn btn-main btn-medium btn-round">
                                    Sign in to comment
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="products related-products section">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Related Products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($dtProR as $R)
            @if($R->id != $dtPro->id )
            <div class="col-md-3 ">
                <div class="product-item ">
                    <div class="product-thumb">
                        @if($R->discount!=0)
                        <span class="bage">Sale</span>
                        @endif
                        <img class="img-responsive" src="{{asset($R->image)}}" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <a href="{{route('user.productdetail',['id'=>$R->id])}}"><i
                                            class="tf-ion-ios-search-strong"></i></a>
                                </li>
                                <li>
                                    <a href="{{route('user.favourite.add',['id'=>$R->id])}}"><i
                                            class="tf-ion-ios-heart"></i></a>
                                </li>
                                <li>
                                    <a class="like" data-url="{{ route('user.like',$R->id)}}"><i
                                            class="tf-ion-thumbsup"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">{{$R->product_name}}</a></h4>
                        <p class="price">${{number_format($R->discount != 0 ? $R->discount : $R->price)}}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach


        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal product-modal fade" id="product-modal">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="tf-ion-close"></i>
    </button>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="modal-image">
                            <img class="img-responsive" src="images/shop/products/modal-product.jpg" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-short-details">
                            <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                            <p class="product-price">$200</p>
                            <p class="product-short-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo
                                laborum numquam rem aut officia dicta cumque.
                            </p>
                            <a href="#!" class="btn btn-main">Add To Cart</a>
                            <a href="#!" class="btn btn-transparent">View Product Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection