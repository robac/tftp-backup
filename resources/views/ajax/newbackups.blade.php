@foreach ($backups as $backup)          
<tr class='new'>
    <td>{{  $backup->src_filename  }}</td>
    <td>{{ App\Helpers\DateTimeHelper::time_elapsed_string($backup->moved) }}</td>
    <td>{{ App\Helpers\FileHelper::human_filesize($backup->size) }}</td>
    <td>{{ $backup->moved }}</td>
</tr>
@endforeach        