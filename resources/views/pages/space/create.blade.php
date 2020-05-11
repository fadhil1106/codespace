@extends('layouts.app')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submit my Space</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'space.store', 'method'  => 'post', 'files'  => true]) !!}
                        {{-- Title --}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', null, [
                                'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control'
                                ]) !!}
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Address --}}
                        <div class="form-group">
                            <label for="address">Address</label>
                            {!! Form::textarea('address', null, [
                                'class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control',
                                'cols'  => "10",
                                'row'   => "3"
                                ]) !!}
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Description</label>
                            {!! Form::textarea('description', null, [
                                'class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control',
                                'cols'  => "10",
                                'row'   => "3"
                                ]) !!}
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Maps Location --}}
                        <div id="here-maps">
                            <label for="pinLocation">Pin Location</label>
                            <div style="height : 500px" id="mapContainer"></div>
                        </div>
                        {{-- Maps Latitude --}}
                        <div class="form-group">
                            <label for="latitute">Latitute</label>
                            {!! Form::text('latitude', null, [
                                'class' => $errors->has('latitute') ? 'form-control is-invalid' : 'form-control', 'id' => 'lat'
                                ]) !!}
                            @error('latitute')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Maps Longitude --}}
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            {!! Form::text('longitude', null, [
                                'class' => $errors->has('longitude') ? 'form-control is-invalid' : 'form-control', 'id' => 'lng'
                                ]) !!}
                            @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group increment">
                            <label for="photo">Photo</label>
                            <div class="input-group">
                                <input type="file" name="photo[]" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary btn-add">
                                        <i class="fas fa-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('photo'))
                            <ul class="alert alert-danger">
                                @foreach ($errors->get('photo') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="clone invisible">
                            <div class="input-group mt-2">
                                <input type="file" name="photo[]" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-danger btn-remove">
                                        <i class="fas fa-minus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        window.action = "submit"

        jQuery(document).ready(function () {
            jQuery(".btn-add").click(function () {
               let markup = jQuery(".invisible").html();
               jQuery(".increment").append(markup); 
            });
            jQuery("body").on("click", ".btn-remove", function () {
                jQuery(this).parents(".input-group").remove();
            });
        });
    </script>
@endpush