@extends('layout.template')
@section('header_scripts')

    <style>
        .daily,.monthly{
            display: none;
        }
        .sales_container div.col-2{
            flex: 0 0 20%;
            max-width: 20%;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <label class="form-check-label" for="sales_type">Sales</label>
                <select class="form-control" name="sales_type" id="sales_type">
                    <option value="all">All Sales</option>
                    <option value="daily">Daily Sales</option>
                    <option value="monthly">Monthly Sales</option>
                    <option value="dispositions">Dispositions</option>
                </select>
            </div>
        </div>
    </div>

    <div class="all sales_container">
        <div class="sale_boxes">
            <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                <div class="row justify-content-around">
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">RGU</p>
                            <div class="s_box_icons">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_all['total_rgu']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Cable</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-television" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_all['cable']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Internet</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-wifi" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_all['internet']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Phone</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_all['phone']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Mobile</p>
                            <div class="dice_icons no_transform no_transform">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_all['mobile']}}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            @foreach($providers_all as $provider)
                @if($loop->index > 2)
                    @break
                @endif
                <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                    <div class="row justify-content-around">

                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>

                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">RGU</p>
                                <div class="s_box_icons">
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->single_play+($provider->double_play*2)+($provider->triple_play*3)+($provider->quad_play*4)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Cable</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-television" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->cable}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Internet</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-wifi" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->internet}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Phone</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Mobile</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->mobile}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Providers Statistics</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="text-center table table-hover table-bordered table-striped mb-0">
                            <thead>
                            <tr  style="border-top:2px solid #000;">
                                <th rowspan="2" style="border:2px solid #000;">Providers</th>
                                <th rowspan="2" style="border:2px solid #000;">Total</th>
                                <th colspan="4" class="text-center" style="border-right:1px solid #000;">Services</th>
                                <th class="text-center" style="border-right:1px solid #000;">SINGLE PLAY</th>
                                <th colspan="3"  class="text-center" style="border-right:1px solid #000;">DOUBLE PLAY</th>
                                <th class="text-center" style="border-right:1px solid #000;">TRIPLE PLAY</th>
                                <th class="text-center" style="border-right:2px solid #000;">Mobile</th>
                            </tr>
                            <tr style="border-bottom:2px solid #000;">
                                <th><i class="fa fa-television" aria-hidden="true"></i></th>
                                <th><i class="fa fa-wifi" aria-hidden="true"></i></th>
                                <th><i class="fa fa-wifi" aria-hidden="true"></i></th>
                                <th style="border-right:1px solid #000;"><i class="fa fa-mobile" style="font-size: 16px"></i></th>
                                <th style="border-right:1px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                                <th>I/P</th>
                                <th>I/C</th>
                                <th style="border-right:1px solid #000;">P/C</th>

                                <th style="border-right:1px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                                <th style="border-right:2px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers_all as $provider)


                                    <tr>
                                        <td style="text-transform: capitalize;border-bottom: 2px solid #000; border-left:2px solid #000;border-right:2px solid #000;"><b>{{$provider->provider_name}}</b></td>
                                        <td style="border-bottom: 2px solid #000;border-right:2px solid #000;">{{$provider->cable + $provider->phone + $provider->internet + $provider->mobile}}</td>
                                        <td style="border-bottom: 2px solid #000">{{$provider->cable  ??  0}}</td>
                                        <td style="border-bottom: 2px solid #000">{{$provider->phone  ??  0 }}</td>
                                        <td style="border-bottom: 2px solid #000">{{$provider->internet ??  0}}</td>
                                        <td style="border-bottom: 2px solid #000">{{$provider->mobile ??  0}}</td>
                                        <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:2px solid #000;">{{$provider->single_play ??  0}}</td>
                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->ip}}</td>
                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->ic}}</td>
                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->pc}}</td>
                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->triple_play + $provider->quad_play }}</td>
                                        <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:1px solid #000;">{{$provider->mobile ??  0}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="daily sales_container">
        <div class="sale_boxes">
            <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                <div class="row justify-content-around">
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">DAILY</p>
                            <p class="yellow_text">RGU</p>
                            <div class="s_box_icons">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_daily['total_rgu']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Cable</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-television" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_daily['cable']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Internet</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-wifi" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_daily["internet"]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Phone</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_daily['phone']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Mobile</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_daily['mobile']}}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            @foreach($providers_daily as $provider)
                @if($loop->index > 2)
                    @break
                @endif
                <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                    <div class="row justify-content-around">

                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>

                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">RGU</p>
                                <div class="s_box_icons">
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->single_play+($provider->double_play*2)+($provider->triple_play*3)+($provider->quad_play*4)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Cable</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-television" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->cable}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Internet</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-wifi" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->internet}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Phone</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Mobile</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->mobile}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Providers Daily Statistics</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="text-center table table-hover table-bordered table-striped mb-0">
                            <thead>
                            <tr  style="border-top:2px solid #000;">
                                <th rowspan="2" style="border:2px solid #000;">Providers</th>
                                <th rowspan="2" style="border:2px solid #000;">Total</th>
                                <th colspan="4" class="text-center" style="border-right:1px solid #000;">Services</th>
                                <th class="text-center" style="border-right:1px solid #000;">SINGLE PLAY</th>
                                <th colspan="3"  class="text-center" style="border-right:1px solid #000;">DOUBLE PLAY</th>
                                <th class="text-center" style="border-right:1px solid #000;">TRIPLE PLAY</th>
                                <th class="text-center" style="border-right:2px solid #000;">Mobile</th>
                            </tr>
                            <tr style="border-bottom:2px solid #000;">
                                <th><i class="fa fa-television" aria-hidden="true"></i></th>
                                <th><i class="fa fa-phone" aria-hidden="true"></i></th>
                                <th><i class="fa fa-wifi" aria-hidden="true"></i></th>
                                <th style="border-right:1px solid #000;"><i class="fa fa-mobile" style="font-size: 16px"></i></th>
                                <th style="border-right:1px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                                <th>I/P</th>
                                <th>I/C</th>
                                <th style="border-right:1px solid #000;">P/C</th>

                                <th style="border-right:1px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                                <th style="border-right:2px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers_daily as $provider)


                                <tr>
                                    <td style="text-transform: capitalize;border-bottom: 2px solid #000; border-left:2px solid #000;border-right:2px solid #000;"><b>{{$provider->provider_name}}</b></td>
                                    <td style="border-bottom: 2px solid #000;border-right:2px solid #000;">{{$provider->cable + $provider->phone + $provider->internet + $provider->mobile}}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->cable  ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->phone  ??  0 }}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->internet ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->mobile ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:2px solid #000;">{{$provider->single_play ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->ip}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->ic}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->pc}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->triple_play + $provider->quad_play }}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:1px solid #000;">{{$provider->mobile ??  0}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="monthly sales_container">
        <div class="sale_boxes">
            <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                <div class="row justify-content-around">
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">RGU</p>
                            <div class="s_box_icons">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_monthly['total_rgu']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Cable</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-television"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_monthly['cable']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Internet</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-wifi"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_monthly['internet']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Phone</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_monthly['phone']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="s_b_col3">
                            <p class="white_text">TOTAL</p>
                            <p class="yellow_text">Mobile</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$rgu_monthly['mobile']}}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            @foreach($providers_monthly as $provider)
                @if($loop->index > 2)
                    @break
                @endif
                <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                    <div class="row justify-content-around">

                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>

                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">RGU</p>
                                <div class="s_box_icons">
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->single_play+($provider->double_play*2)+($provider->triple_play*3)+($provider->quad_play*4)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Cable</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-television" aria-hidden="true"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->cable}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Internet</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-wifi"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->internet}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Phone</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->phone}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">
                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>
                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Mobile</p>
                                <div class="dice_icons no_transform">
                                    <i class="fa fa-mobile"></i>
                                </div>
                                <div class="red_b_circle">
                                    <p class="p_nums">{{$provider->mobile}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Providers Monthly Statistics</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="text-center table table-hover table-bordered table-striped mb-0">
                            <thead>
                            <tr  style="border-top:2px solid #000;">
                                <th rowspan="2" style="border:2px solid #000;">Providers</th>
                                <th rowspan="2" style="border:2px solid #000;">Total</th>
                                <th colspan="4" class="text-center" style="border-right:1px solid #000;">Services</th>
                                <th class="text-center" style="border-right:1px solid #000;">SINGLE PLAY</th>
                                <th colspan="3"  class="text-center" style="border-right:1px solid #000;">DOUBLE PLAY</th>
                                <th class="text-center" style="border-right:1px solid #000;">TRIPLE PLAY</th>
                                <th class="text-center" style="border-right:2px solid #000;">Mobile</th>
                            </tr>
                            <tr style="border-bottom:2px solid #000;">
                                <th><i class="fa fa-television" aria-hidden="true"></i></th>
                                <th><i class="fa fa-phone" aria-hidden="true"></i></th>
                                <th><i class="fa fa-wifi" aria-hidden="true"></i></th>
                                <th style="border-right:1px solid #000;"><i class="fa fa-mobile" style="font-size: 16px"></i></th>
                                <th style="border-right:1px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                                <th>I/P</th>
                                <th>I/C</th>
                                <th style="border-right:1px solid #000;">P/C</th>

                                <th style="border-right:1px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                                <th style="border-right:2px solid #000;" class="text-center">
                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="" class="dice-img-dashboard" width="50">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers_monthly as $provider)


                                <tr>
                                    <td style="text-transform: capitalize;border-bottom: 2px solid #000; border-left:2px solid #000;border-right:2px solid #000;"><b>{{$provider->provider_name}}</b></td>
                                    <td style="border-bottom: 2px solid #000;border-right:2px solid #000;">{{$provider->cable + $provider->phone + $provider->internet + $provider->mobile}}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->cable  ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->phone  ??  0 }}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->internet ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000">{{$provider->mobile ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:2px solid #000;">{{$provider->single_play ??  0}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->ip}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->ic}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->pc}}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->triple_play + $provider->quad_play }}</td>
                                    <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:1px solid #000;">{{$provider->mobile ??  0}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="dispositions sales_container">
        <div class="sale_boxes">
            <div class="sale_boxe_row1 daily-sales" id="daily_sales">
                <div class="row justify-content-around">
                    <div class="col-2 mb-3">
                        <div class="s_b_col1">
                            <p class="black_text">TOTAL</p>
                            <p class="red_text">Dispositions</p>
                            <div class="s_box_icons">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$total_dispositions}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col1">
                            <p class="black_text">TOTAL</p>
                            <p class="red_text">Sale Made</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$total_sale_made}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col1">
                            <p class="black_text">TOTAL</p>
                            <p class="red_text">Call Back</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-phone-volume"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$total_call_back}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col1">
                            <p class="black_text">TOTAL</p>
                            <p class="red_text">Customer Service</p>
                            <div class="box_icons">
                            <img src="{{asset('assets/img/icons/headset-solid.svg')}}" alt="">
                        </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$total_customer_service}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col1">
                            <p class="black_text">TOTAL</p>
                            <p class="red_text">No Answer</p>
                            <div class="box_icons">
                            <img src="{{asset('assets/img/icons/phone-slash-solid.svg')}}" alt="">
                        </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$total_no_answer}}</p>
                            </div>
                        </div>
                    </div>
{{--                    //second row--}}
                    <div class="col-2 mb-3">
                        <div class="s_b_col2">
                            <p class="black_text">Monthly</p>
                            <p class="red_text">Dispositions</p>
                            <div class="s_box_icons">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$six_months_dispositions_count['one_month']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col2">
                            <p class="black_text">Monthly</p>
                            <p class="red_text">Sale Made</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$monthly_sale_made}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col2">
                            <p class="black_text">Monthly</p>
                            <p class="red_text">Call Back</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-phone-volume"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$monthly_call_back}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col2">
                            <p class="black_text">Monthly</p>
                            <p class="red_text">Customer Service</p>
                            <div class="box_icons">
                            <img src="{{asset('assets/img/icons/headset-solid.svg')}}" alt="">
                        </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$monthly_customer_service}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col2">
                            <p class="black_text">Monthly</p>
                            <p class="red_text">No Answer</p>
                            <div class="box_icons">
                            <img src="{{asset('assets/img/icons/phone-slash-solid.svg')}}" alt="">
                        </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$monthly_no_answer}}</p>
                            </div>
                        </div>
                    </div>
{{--                    //third row--}}
                    <div class="col-2 mb-3">
                        <div class="s_b_col3">
                            <p class="white_text">Daily</p>
                            <p class="yellow_text">Dispositions</p>
                            <div class="s_box_icons">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$daily_disp}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col3">
                            <p class="white_text">Daily</p>
                            <p class="yellow_text">Sale Made</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$daily_sale_made}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col3">
                            <p class="white_text">Daily</p>
                            <p class="yellow_text">Call Back</p>
                            <div class="dice_icons no_transform">
                                <i class="fa fa-phone-volume"></i>
                            </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$daily_call_back}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col3">
                            <p class="white_text">Daily</p>
                            <p class="yellow_text">Customer Service</p>
                            <div class="box_icons">
                            <img src="{{asset('assets/img/icons/headset-solid.svg')}}" alt="">
                        </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$daily_customer_service}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="s_b_col3">
                            <p class="white_text">Daily</p>
                            <p class="yellow_text">No Answer</p>
                            <div class="box_icons">
                            <img src="{{asset('assets/img/icons/phone-slash-solid.svg')}}" alt="">
                        </div>
                            <div class="red_b_circle">
                                <p class="p_nums">{{$daily_no_answer}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                SPECTRUM INTERNET AND MOBILE RATIO DAILY
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="piechart_3d_daily" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-6">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                                SPECTRUM INTERNET AND MOBILE RATIO MONTHLY
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>



{{--    <div class="daily sales_container">--}}
{{--        <div class="sale_boxes">--}}
{{--            <div class="sale_boxe_row1 daily-sales" id="daily_sales">--}}
{{--                <div class="row justify-content-around">--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Daily Sales</p>--}}
{{--                            <div class="s_box_icons">--}}
{{--                                <i class="fa fa-bar-chart"></i>--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_daily[0]->total_sales??0}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Internet / Cable</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_daily[0]->ic}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Internet / Phone</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-two.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_daily[0]->ip}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Cable / Phone</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_daily[0]->pc}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Mobille</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_daily[0]->mobile}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}


{{--            @foreach($others_daily as $provider)--}}
{{--                @if($loop->index > 2)--}}
{{--                    @break--}}
{{--                @endif--}}
{{--                <div class="sale_boxe_row1 daily-sales" id="daily_sales">--}}
{{--                    <div class="row justify-content-around">--}}

{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Daily Sales</p>--}}
{{--                                <div class="s_box_icons">--}}
{{--                                    <i class="fa fa-bar-chart"></i>--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->total_sales}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Single Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->single_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Double Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-two.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->double_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Triple Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->triple_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Quad Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->quad_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Providers Daily Statistics</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="text-center table table-hover table-bordered table-striped mb-0">--}}
{{--                            <thead>--}}
{{--                            <tr  style="border-top:2px solid #000;">--}}
{{--                                <th rowspan="2" style="border:2px solid #000;">Providers</th>--}}
{{--                                <th rowspan="2" style="border:2px solid #000;">Total</th>--}}
{{--                                <th colspan="4" class="text-center" style="border-right:1px solid #000;">Services</th>--}}
{{--                                <th class="text-center" style="border-right:1px solid #000;">SINGLE PLAY</th>--}}
{{--                                <th class="text-center" style="border-right:1px solid #000;">DOUBLE PLAY</th>--}}
{{--                                <th class="text-center" style="border-right:1px solid #000;">TRIPLE PLAY</th>--}}
{{--                                <th class="text-center" style="border-right:2px solid #000;">QUAD PLAY</th>--}}
{{--                            </tr>--}}
{{--                            <tr style="border-bottom:2px solid #000;">--}}
{{--                                <th><i class="fa fa-television" aria-hidden="true"></i></th>--}}
{{--                                <th><i class="fa fa-phone" aria-hidden="true"></i></th>--}}
{{--                                <th><i class="fa fa-wifi" aria-hidden="true"></i></th>--}}
{{--                                <th style="border-right:1px solid #000;"><i class="fa fa-mobile" style="font-size: 16px"></i></th>--}}
{{--                                <th style="border-right:1px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                                <th style="border-right:1px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-two.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                                <th style="border-right:1px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                                <th style="border-right:2px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($others_daily as $provider)--}}

{{--                                @if($loop->index>2)--}}

{{--                                    <tr>--}}
{{--                                        <td style="text-transform: capitalize;border-bottom: 2px solid #000; border-left:2px solid #000;border-right:2px solid #000;"><b>{{$provider->provider_name}}</b></td>--}}
{{--                                        <td style="border-bottom: 2px solid #000;border-right:2px solid #000;">{{$provider->cable + $provider->phone + $provider->internet + $provider->mobile}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->cable  ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->phone  ??  0 }}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->internet ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->mobile ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:2px solid #000;">{{$provider->single_play ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->double_play ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->triple_play ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:1px solid #000;">{{$provider->quad_play ??  0}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


{{--    <div class="monthly sales_container">--}}
{{--        <div class="sale_boxes">--}}
{{--            <div class="sale_boxe_row1 daily-sales" id="daily_sales">--}}
{{--                <div class="row justify-content-around">--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Monthly Sales</p>--}}
{{--                            <div class="s_box_icons">--}}
{{--                                <i class="fa fa-bar-chart"></i>--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_monthly[0]->total_sales??0}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Internet / Cable</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_monthly[0]->ic}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Internet / Phone</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-two.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_monthly[0]->ip}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Cable / Phone</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_monthly[0]->pc}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="s_b_col3">--}}
{{--                            <p class="white_text">Spectrum</p>--}}
{{--                            <p class="yellow_text">Mobille</p>--}}
{{--                            <div class="dice_icons">--}}
{{--                                <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="red_b_circle">--}}
{{--                                <p class="p_nums">{{$spectrum_monthly[0]->mobile}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}


{{--            @foreach($others_monthly as $provider)--}}
{{--                @if($loop->index > 2)--}}
{{--                    @break--}}
{{--                @endif--}}
{{--                <div class="sale_boxe_row1 daily-sales" id="daily_sales">--}}
{{--                    <div class="row justify-content-around">--}}

{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Monthly Sales</p>--}}
{{--                                <div class="s_box_icons">--}}
{{--                                    <i class="fa fa-bar-chart"></i>--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->total_sales}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Single Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->single_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Double Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-two.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->double_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Triple Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->triple_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-2">--}}
{{--                            <div class="s_b_col{{$loop->index==0?'1':($loop->index==1?'2':'3')}}">--}}
{{--                                <p class="{{$loop->index==2?'white_text':'black_text'}}">{{$provider->provider_name}}</p>--}}
{{--                                <p class="{{$loop->index==2?'yellow_text':'red_text'}}">Quad Play</p>--}}
{{--                                <div class="dice_icons">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="red_b_circle">--}}
{{--                                    <p class="p_nums">{{$provider->quad_play}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h4>Providers Monthly Statistics</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="text-center table table-hover table-bordered table-striped mb-0">--}}
{{--                            <thead>--}}
{{--                            <tr  style="border-top:2px solid #000;">--}}
{{--                                <th rowspan="2" style="border:2px solid #000;">Providers</th>--}}
{{--                                <th rowspan="2" style="border:2px solid #000;">Total</th>--}}
{{--                                <th colspan="4" class="text-center" style="border-right:1px solid #000;">Services</th>--}}
{{--                                <th class="text-center" style="border-right:1px solid #000;">SINGLE PLAY</th>--}}
{{--                                <th class="text-center" style="border-right:1px solid #000;">DOUBLE PLAY</th>--}}
{{--                                <th class="text-center" style="border-right:1px solid #000;">TRIPLE PLAY</th>--}}
{{--                                <th class="text-center" style="border-right:2px solid #000;">QUAD PLAY</th>--}}
{{--                            </tr>--}}
{{--                            <tr style="border-bottom:2px solid #000;">--}}
{{--                                <th><i class="fa fa-television" aria-hidden="true"></i></th>--}}
{{--                                <th><i class="fa fa-phone" aria-hidden="true"></i></th>--}}
{{--                                <th><i class="fa fa-wifi" aria-hidden="true"></i></th>--}}
{{--                                <th style="border-right:1px solid #000;"><i class="fa fa-mobile" style="font-size: 16px"></i></th>--}}
{{--                                <th style="border-right:1px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-one.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                                <th style="border-right:1px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-two.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                                <th style="border-right:1px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-three.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                                <th style="border-right:2px solid #000;" class="text-center">--}}
{{--                                    <img src="{{asset('assets/img/icons/dice-four.svg')}}" alt="" class="dice-img-dashboard" width="50">--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($others_monthly as $provider)--}}

{{--                                @if($loop->index>2)--}}

{{--                                    <tr>--}}
{{--                                        <td style="text-transform: capitalize;border-bottom: 2px solid #000; border-left:2px solid #000;border-right:2px solid #000;"><b>{{$provider->provider_name}}</b></td>--}}
{{--                                        <td style="border-bottom: 2px solid #000;border-right:2px solid #000;">{{$provider->cable + $provider->phone + $provider->internet + $provider->mobile}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->cable  ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->phone  ??  0 }}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->internet ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000">{{$provider->mobile ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:2px solid #000;">{{$provider->single_play ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->double_play ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:1px solid #000; border-left:1px solid #000;">{{$provider->triple_play ??  0}}</td>--}}
{{--                                        <td style="border-bottom: 2px solid #000; border-right:2px solid #000; border-left:1px solid #000;">{{$provider->quad_play ??  0}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




    <!--Begin::Section-->
    <!--End::Section-->
    <!--Begin::Section-->
    <!--end::Portlet-->

    <?php
    foreach($providers_monthly as $provider){
        if($provider->provider_name == 'spectrum'){
            $spectrum = $provider;
        }
    }
    foreach($providers_daily as $provider){
        if($provider->provider_name == 'spectrum'){
            $spectrum_daily = $provider;
        }
    }
    ?>
@endsection


@section('footer_scripts')
    <!-- Page Specific JS File -->
    <script src="https://www.google.com/jsapi" type="text/javascript"></script>
    {{--//GOOGLE CHART--}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages':['corechart','bar'],});
        google.charts.setOnLoadCallback(drawChart);

        let spectrum = <?php
            if(isset($spectrum)){
                print_r(json_encode($spectrum));
            }else echo 0;?>;
        let spectrum_daily = <?php
            if(isset($spectrum_daily)){
                print_r(json_encode($spectrum_daily));
            }else echo 0;?>;

        $('#sales_type').change(function() {
            if($(this).val() == "all"){
                window.localStorage.setItem("reports_state", "all");
                $('.sales_container').hide();
                $('.dispositions').hide();
                $('.all').show();
            }
            else if($(this).val() == "daily"){
                window.localStorage.setItem("reports_state", "daily");
                $('.sales_container').hide();
                $('.dispositions').hide();
                $('.daily').show();
            }
            else if($(this).val() == "monthly"){
                window.localStorage.setItem("reports_state", "monthly");
                $('.sales_container').hide();
                $('.dispositions').hide();
                $('.monthly').show();
            }
            else{
                window.localStorage.setItem("reports_state", "dispositions");
                $('.sales_container').hide();
                $('.monthly').hide();
                $('.dispositions').show();
            }
        });

        $(document).ready(function(){
            var reports_state = localStorage.getItem("reports_state");
            $('#sales_type').val(reports_state);
            $('#sales_type').trigger('change');

        });
        function drawChart() {
            // PIE CHART
            var dt = google.visualization.arrayToDataTable([
                ['Service', 'Sales per month'],
                ['Mobile: '+parseInt(spectrum['mobile']),  parseInt(spectrum['mobile']) ],
                ['Internet: '+ parseInt(spectrum['internet']),  (parseInt(spectrum['internet']) - parseInt(spectrum['mobile']))]
            ]);
            var pie_options = {
                title: 'Total : '+(parseInt(spectrum['mobile']) + parseInt(spectrum['internet'])),
                is3D: true,
            };
            var pie_chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            pie_chart.draw(dt, pie_options);


            // PIE CHART DAILY
            var dt = google.visualization.arrayToDataTable([
                ['Service', 'Sales per month'],
                ['Mobile: '+parseInt(spectrum_daily['mobile']),  parseInt(spectrum_daily['mobile']) ],
                ['Internet: '+ parseInt(spectrum_daily['internet']),  parseInt(spectrum_daily['internet'])]
            ]);
            var pie_options = {
                title: 'Total : '+(parseInt(spectrum_daily['mobile']) + parseInt(spectrum_daily['internet'])),
                is3D: true,
            };
            var pie_chart = new google.visualization.PieChart(document.getElementById('piechart_3d_daily'));
            pie_chart.draw(dt, pie_options);
        }
    </script>

@endsection
