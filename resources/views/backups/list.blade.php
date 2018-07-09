@extends('layouts.app')

@section('head')
@parent
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/clipboard.min.js') }}" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
      
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <a class="btn" href="#">
  <i class="icon-repeat"></i> Reload</a>
                <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="icon-shopping-cart icon-large"></i>
                </button>
        </div>        
        
        @if (count($backups) > 0)
        <table class="table table-hover" id="backupslist">
            <thead>
              <tr>
                <th scope="col">filename</th>
                <th scope="col">uploaded</th>
                <th scope="col">size</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($backups as $backup)          
                <tr>
                    <td>{{  $backup->src_filename  }}</td>
                    <td>{{ App\Helpers\DateTimeHelper::time_elapsed_string($backup->moved) }}</td>
                    <td>{{ App\Helpers\FileHelper::human_filesize($backup->size) }}</td>
                    <td class='hide'>{{ $backup->moved }}</td>
                </tr>
                @endforeach
            </tbody>    
        </table>
        {{ $backups->links()    }}
        @else
        <h2>No results!</h2>
        @endif
    </div>
</div>

<script>
function checkNews() {
    $.ajax({
        url: "{{ route('ajax/newbackups')}}",
        context: document.body,
        data: {lastBackup : localStorage.lastBackup},
        success: function(data) {
            if (data.count > 0) {
              $('#backupslist tbody').prepend(data.data);
              localStorage.lastBackup = data.lastBackup;
            }
        },
        complete: function() {
            setTimeout(checkNews, {{ $checktimeout }});
        }
    })
}

    
$(document).ready(function(){
    localStorage.lastBackup = "{{ $lastBackup }}";
    localStorage.page = "{{ $page }}";
    
    if (!localStorage.page || (localStorage.page == 1)) {
        setTimeout(checkNews, {{ $checktimeout }});
    }
});
</script>    
@endsection
