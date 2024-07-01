@extends('User.layout.master')
@section('user')
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .video-item {
            transition: transform 0.3s ease;
        }

        /* .video-item:hover {
                transform: translateY(-10px);
            } */

        .video-item h2 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .video-item iframe {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .no-videos {
            text-align: center;
            color: #999;
            font-size: 1.25rem;
            margin-top: 20px;
        }
    </style>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="h3">Videos</h1>
                            </div>
                            <div>
                                @if (@$videolink->button_name)
                                    <a href="{{ $videolink->link ?? null }}"
                                        class="btn btn-success">{{ $videolink->button_name ?? null }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if (isset($videos) && count($videos) > 0)
                                @foreach ($videos as $item)
                                    <div class="col-md-4 mb-4">
                                        <div class="video-item card shadow-sm">
                                            <div class="card-body">
                                                <h2 class="h5">{{ $item->title }}</h2>
                                                <iframe class="w-100" height="auto"
                                                    src="https://www.youtube.com/embed/{{ $item->video }}" frameborder="0"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p>No videos available.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
