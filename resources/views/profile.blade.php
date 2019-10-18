@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="{{ $user->photo }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">

            <h2>Profile de {{$user->name}}</h2>

            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Modifier l'image de profile</label><br>
                <input type="file" name="photo">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
