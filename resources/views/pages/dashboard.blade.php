@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table borderless">
            <tbody>
            @foreach($buttons as $items)
                <tr>
                    @foreach($items as $button)
                        <td>
                            @if($button->color->name !== 'DEFAULT')
                                <div class="card {{ $button->color->name }}">
                                    <div class="card-body" onclick="window.open('{{ $button->link }}')">
                                        <span>
                                            {{ $button->title }}
                                        </span>
                                    </div>
                                    <div class="footer-options" style="text-align: center;">
                                        <a href="{{ route('buttons.edit', [$button->id]) }}" class="btn btn-dark update">UPDATE</a>
                                        <form method="POST" action="{{ route('buttons.destroy', [$button->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input class="btn btn-dark delete" type="submit" value="DELETE">
                                        </form>
                                    </div>
                                </div>
                            @else
                                <button class="btn btn-outline-dark"
                                        onclick="location.href = '{{ route('buttons.edit', [$button->id]) }}'">
                                    <i class='fas fa-plus-circle'></i>
                                </button>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

