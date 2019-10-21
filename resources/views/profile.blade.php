<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Profile {{$user->name}}</title>

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
            <div class="container">
              <div class="row">
                <div class="col-12 my-3 pt-3 shadow">

                  <img src="{{ $user->image->url }}" alt="Img profile {{ $user->name }}" class="float-left rounded-circle mr-2">

                  <h1>{{ $user->name }}</h1>
                  <h3>{{ $user->email }}</h3><br>

                  <p>
                    <strong>Instagram</strong>: {{ $user->profile->instagram }}<br>
                    <strong>Github</strong>: {{ $user->profile->github }}<br>
                    <strong>web</strong>: {{ $user->profile->web }}
                </p>
                <p>
                    <strong>Pais</strong>: {{ $user->location->country }} <br>
                    <strong>Nivel</strong>: @if ($user->level)
                      <a href="#">{{ $user->level->name }}</a>
                    @else
                      ----
                    @endif <br>
                </p>
                <hr>
                <p>
                  <strong>Grupos</strong>:
                  @forelse ($user->groups as $group)
                    <span class="badge badge-primary">{{ $group->name }}</span>
                  @empty
                    <em>No pertenece a ningun grupo</em>
                  @endforelse
                  <hr>
                </p>
                </div>
              </div>
            </div>
    </body>
</html>
