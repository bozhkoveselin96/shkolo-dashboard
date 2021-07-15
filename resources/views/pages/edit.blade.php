@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        @if($button->name === '' || $button->link === '')
            <h1 class="my-4">Create button</h1>
        @else
            <h1 class="my-4">Update button</h1>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buttons.update', $button->id) }}" method="POST">
            @method('PUT')
            @csrf
            Title: <input type="text" name="title" value="{{ $button->title }}" class="form-control">
            <br>
            Link: <input type="url" name="link" value="{{ $button->link }}" class="form-control">
            <br>
            Color:
            <select name="color_id" class="custom-select">
                @foreach($colors as $color)
                    @if($color->id === $button->color_id)
                        <option value="{{ $color->id }}" selected>{{ $color->name }}</option>
                    @else
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endif
                @endforeach
            </select>

            @if($button->name === '' || $button->link === '')
                <input type="submit" class="btn btn-success update-btn" value="CREATE">
            @else
                <input type="submit" class="btn btn-primary update-btn" value="UPDATE">
            @endif

        </form>
    </div>
@endsection
