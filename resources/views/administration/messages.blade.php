@extends('administration\adminlayout')
@inject('MessageController', 'App\Http\Controllers\MessageController')

@section('content')

    <style>
        .accordion {
          background-color: #eee;
          color: #444;
          cursor: pointer;
          padding: 18px;
          width: 100%;
          border: none;
          text-align: left;
          outline: none;
          font-size: 15px;
          transition: 0.4s;
        }

        .active, .accordion:hover {
          background-color: #ccc;
        }
        
        .panel {
          padding: 0 18px;
          background-color: white;
          max-height: 0;
          overflow: hidden;
          transition: max-height 0.2s ease-out;
        }

        .flex-btwn {
            display: flex;
            justify-content: space-between;
        }

        p {
            margin-left: 10px;
        }

        .w-33 {
            width: 33.33%;
        }

        .left {
            text-align: right;
        }


    </style>

    @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <em>
        @if (isset($_GET['filter']) && $_GET['filter'] == 'all')
            <a href="messages">N'afficher que les messages actifs</a>
        @else
            <em><a href="messages?filter=all">Voir tout les messages</a>
        @endif
    </em>
    <br> <br>

    @foreach ($messages as $message)
        
            <button class="accordion flex-btwn">
                <div class="w-33" >
                    Le : <span style="color: blue;">{{ $MessageController::Created_at_dateFormat($message['id']) }}</span>
                    de: <span style="color: red;">{{ $message['fullname'] }}</span>
                </div>
                <div class="w-33 txt-center" >
                    <b>{{ $message['title'] }}</b>
                </div>
                <div class="w-33 left">
                    @if ($message['type'] == 'custom_creation')
                        <em>Création personalisée</em>
                    @elseif ($message['type'] == 'existing_creation')
                        <em>Création existante</em>
                    @elseif ($message['type'] == 'informations')
                        <em>Renseignement</em>
                    @endif

                    @if ($message['status'] == 1)
                        <a href="disable_msg?id={{ $message['id'] }}"><img src="img/suppr_icon.png" alt="Suppimer le message"></a>
                    @endif
                </div>
            </button>

            <div class="panel">
                Numéro de téléphone:<br>
                {{ $message['phonenumber'] }}<br><br>
                Description:
                <p>{{ $message['description'] }}</p>
                @if (isset($message['filepath']))
                    <a href="{{ $message['filepath'] }}" target="_blank">Voir la Pièce jointe</a><br><br>
                @endif
            </div>

        <br>
    @endforeach

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
        }
    </script>


@endsection
