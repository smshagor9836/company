@section('style')

@endsection
@extends('layouts.backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row mb-30">
            
            <div class="col-lg-12">
                <div class="customaizer-area">
                    <h3>{{ __('Welcome To Admin Panel') }}</h3>
                    <p>{{ __('We’ve assembled some links to get you started:') }}</p>
                </div>
                <hr>
            </div>
            <div class="col-lg-5">
                <div class="customaizer-area">
                    <div class="get-started">
                        <h4>{{ __('Get Started') }}</h4>
                        <a href="{{ route('admin.customaizer.index') }}">{{ __('Customize Your Site') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="next-steps">
                    <h4>{{ __('Next Steps') }}</h4>
                    <ul>
                        <li><a href="{{ url('admin/metting/create') }}"><i class="far fa-handshake"></i> {{ __('Add Live Meeting') }}</a></li>
                        <li><a href="{{ route('admin.page.create') }}"><i class="far fa-file"></i> {{ __('Add additional pages') }}</a></li>
                        <li><a href="{{ route('admin.post.create') }}"><i class="fab fa-blogger-b"></i> {{ __('Add a blog post') }}</a></li>
                        <li><a href="{{ url('/') }}"><i class="fas fa-eye"></i> {{ __('View your site') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="next-steps">
                    <h4>{{ __('More Action') }}</h4>
                    <ul>
                        <li><a href="{{ url('admin/appearance/menu') }}"><i class="fas fa-bars"></i> {{ __('Manage menus') }}</a></li>
                        <li><a href="{{ url('admin/setting/seo') }}"><i class="fas fa-cogs"></i> {{ __('SEO Settings') }}</a></li>
                        <li><a href="{{ url('admin/setting/env') }}"><i class="fas fa-cog"></i></i> {{ __('Manage system Settings') }}</a></li>
                        <li><a href="{{ url('admin/setting/filesystem') }}"><i class="fas fa-file-code"></i> {{ __('Manage filesystem') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="col-lg-6">
                <h4>@if($type == 'live')Live @elseif($type == 'upcoming')Upcoming @else Schduled @endif{{ __('Meeting List') }}</h4>
            </div>
        </div>
        <div class="table-responsive custom-table">
            <table class="table">
                <thead>
                    <tr>
                        <th class="am-title">{{ __('Title') }}</th>
                        <th class="am-author">{{ __('Live Class') }}</th>
                        <th class="am-tags">{{ __('Status') }}</th>
                        <th class="am-tags">{{ __('Duration') }}</th>
                        <th class="am-tags">{{ __('Date') }}</th>
                        <th class="am-date">{{ __('Start Time') }}</th>
                        <th class="am-date">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($main_data))
                    @foreach($main_data['meetings'] as $value)
                    <tr>
                        <td>
                            {{ $value['topic'] }}
                            <div class="hover">
                                <a href="{{ route('zoom.edit',$value['id']) }}">{{ __('Edit') }}</a>
                                <a href="{{ route('zoom.delete',$value['id']) }}" class="last">{{ __('Delete') }}</a>
                            </div>
                        </td>
                        <td>{{ $value['id'] }}</td>
                        <td>
                            @if($type == 'upcoming')
                            upcoming
                            @elseif($type == 'live')
                            live
                            @else
                            scheduled
                            @endif
                        </td>
                        <td>{{ $value['duration'] }} minutes</td>
                        @if(isset($value['start_time']))
                        <td>
                            @php
                            $main_date = str_replace("T", " ", $value['start_time']);
                            $final_date = substr($main_date, 0,-4);
                            @endphp
                            {{ Carbon\Carbon::parse($final_date)->isoFormat('ll') }}
                        </td>
                        @else
                        <td>null</td>
                        @endif
                        @if(isset($value['start_time']))
                        <td>{{ Carbon\Carbon::parse($final_date)->isoFormat('LT') }}</td>
                        @else
                        <td>null</td>
                        @endif
                        <td>
                            @if($type == 'live')
                            <a class="live_btn" href="{{ route('zoom.host',$value['id']) }}">{{ __('Join Live') }}</a>
                            @else
                            <a class="live_btn" href="{{ route('zoom.host',$value['id']) }}">{{ __('Start Live') }}</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

                <tfoot>
                    <tr>
                        <th class="am-title">{{ __('Title') }}</th>
                        <th class="am-author">{{ __('Live Class') }}</th>
                        <th class="am-tags">{{ __('Status') }}</th>
                        <th class="am-tags">{{ __('Duration') }}</th>
                        <th class="am-tags">{{ __('Date') }}</th>
                        <th class="am-date">{{ __('Start Time') }}</th>
                        <th class="am-date">{{ __('Action') }}</th>
                    </tr>
                </tfoot>
            </table>
             @if(!empty($main_data))
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    @php
                    $v=1;
                    @endphp

                    <li class="page-item @if($main_data['page_number']===1) disabled @endif">
                        <a class="page-link" href="{{route('zoom',['upcoming'=>"upcoming",'id'=>$main_data['page_number']-1 ])}}">Previous</a>
                    </li>
                    @for($i=1; $i < $main_data['page_count']; $i++)
                    <li class="page-item @if(url()->current() === route('zoom',['upcoming'=>"upcoming",'id'=>$i])) active @php $v=$i @endphp @endif" aria-current="page"><a class="page-link" href="{{route('zoom',['upcoming'=>"upcoming",'id'=>$i])}}">{{$i}}</a></li>
                    @endfor
                    <li class="page-item @if($main_data['page_count'] === $v+1 || $main_data['total_records'] == count($main_data['meetings'])) disabled @endif">
                        <a class="page-link" href="{{route('zoom',['upcoming'=>"upcoming",'id'=>$v+1])}}">Next</a>
                    </li>
                </ul>
            </nav>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
    "use strict";    
//response will assign this function
function success(res){
   location.reload();
}
function errosresponse(xhr){
    $("#errors").html("<li class='text-danger'>"+xhr.responseJSON[0]+"</li>")
}

</script>
@endsection