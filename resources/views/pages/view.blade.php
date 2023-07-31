@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')

<div class="card details">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{$person->image_url ? url($person->image_url) : asset('images/no_image_person.jpg')}}" width="{{$person->width ?? 300}}" height="{{$person->height ?? 300}}" class="img-details">
        <a href="{{url($person->link)}}" target="_blank" class="content-details" style="width: {{$person->width ? $person->width . 'px' : 300 . 'px'}}; height: {{$person->height ? $person->height . 'px' : 300 . 'px'}}">
            <div class="text">Go to official page</div>
        </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 d-flex">
                    <i class="fa-solid fa-user fa-lg mr-2 mt-2"></i>
                    <h5 class="card-title">{{$person->name}}</h5>
                </div>
                <div class="col-md-4">
                    <i class="fa-solid fa-id-card fa-lg"></i>
                    {{$person->license}}
                </div>
                <div class="col-md-4">
                    status: <span class="badge badge-pill badge-warning">{{$person->wl_status ? 'TRUE' : 'FALSE'}}</span>
                </div>
            </div>
            <span class="font-weight-bold">Aliases: </span>
            @forelse ($person->aliases as $alias)
                <span class="badge badge-pill badge-danger">{{$alias->name}}</span>
            @empty
                <span>N/A</span>
            @endforelse
            <div class="row">
                <div class="col">
                    <p><strong>Hair color: </strong>{{$person->attribute->hair_color ?? 'N/A'}}</p>
                    <p><strong>Ethnicity: </strong>{{$person->attribute->ethnicity ?? 'N/A'}}</p>
                    <p><strong>Tattoos: </strong>
                        @if ($person->attribute->tattoos === null)
                        <span class="badge badge-pill badge-dark">N/A</span>
                        @elseif ($person->attribute->tattoos)
                            <span class="badge badge-pill badge-success">Yes</span>
                        @else
                            <span class="badge badge-pill badge-danger">No</span>
                        @endif
                    </p>
                    <p><strong>Piercings: </strong>
                        @if ($person->attribute->piercings === null)
                            <span class="badge badge-pill badge-dark">N/A</span>
                        @elseif ($person->attribute->piercings)
                            <span class="badge badge-pill badge-success">Yes</span>
                        @else
                            <span class="badge badge-pill badge-danger">No</span>
                        @endif
                    </p>
                    <p><strong>Breast size: </strong>{{$person->attribute->breast_size ?? 'N/A'}}</p>
                    <p><strong>Breast type: </strong>{{$person->attribute->breast_type ?? 'N/A'}}</p>
                    <p><strong>Gender: </strong>{{$person->attribute->gender ?? 'N/A'}}</p>
                    <p><strong>Orientation: </strong>{{$person->attribute->orientation ?? 'N/A'}}</p>
                    <p><strong>Age: </strong>{{$person->attribute->age ?? 'N/A'}}</p>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <button class="btn rounded-pill btn-warning" type="button" data-toggle="modal" data-target="#modalStatistic">Statistic details</button>
                </div>
                <x-modal name="modalStatistic" title="Statistics">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Subscriptions: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->subscriptions}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Monthly searches: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->monthly_searches}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Views: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->views}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Videos count: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->videos_count}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Premium videos count: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->premium_videos_count}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">White label video count: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->white_label_video_count}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Rank: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->rank}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Rank premium: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->rank_premium}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Rank wl: </p>
                                    <span class="badge badge-primary badge-pill">{{$person->statistic->rank_wl}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </x-modal>
            </div>
        </div>
      </div>
    </div>
</div>


@endsection
