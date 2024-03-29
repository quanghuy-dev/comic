@extends('admin.layouts.master')
@section('content')
<style>
.dataTables_scrollBody {
    max-height: none !important;
}
</style>
<div class="app-inner-layout">
    <div class="app-inner-layout__header-boxed p-0">
        <div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                           Comic Dashboard

                        </div>


                    </div>

                </div>

            </div>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-dice mr-3 text-muted opacity-6"> </i>
                        List of Comics
                    </div>
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <div class="btn-group dropdown">
                            <a href="{{route('admin.comics.create')}}">
                                <div type="button" class="btn-icon btn-icon-only btn btn-link">
                                    Add <i class="pe-7s-plus btn-icon-wrapper"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60%!important">Name</th>
                                <th style="width: 30%">Title</th>
                                <th>Image</th>
                                <th>Genres</th>
                                <th>Authors</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comics as $comic)
                            <tr>
                                <td><a href="{{route('admin.comics.edit', $comic->id)}}"
                                        style="color: #495057;; text-decoration: none;">{{$comic->name}}</a></td>
                                <td><a href="{{route('admin.comics.edit', $comic->id)}}"
                                        style="color: #495057;; text-decoration: none;">{{$comic->title}}</a></td>
                                <td><a href="{{route('admin.comics.edit', $comic->id)}}"
                                        style="color: #495057;; text-decoration: none;"><img
                                            style="width: 100%; height: 80px"
                                            src="{{asset('/uploads/comics/'.$comic->image)}}"
                                            onerror="this.onerror=null; this.src='{{$no_product_image}}'" alt="{{$comic->image}}">
                                    </a>
                                </td>
                                <td>
                                    @php
                                    $genres = array();
                                    $authors = array();
                                    @endphp
                                    @foreach($comic->genres as $genre)
                                    <a href="{{route('admin.genres.edit', $genre->id)}}"
                                        style="color: #495057;text-decoration: none;">
                                        @php
                                        array_push($genres, $genre->name);
                                        @endphp
                                    </a>
                                    @endforeach
                                    {{implode(", ", $genres)}}
                                </td>
                                <td>
                                    @foreach($comic->authors as $author)
                                    @php
                                    array_push($authors, $author->name);
                                    @endphp
                                    @endforeach
                                    {{implode(",", $authors)}}
                                </td>
                            </tr>
                            </a>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection