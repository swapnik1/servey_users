<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <table border="1">
                    <tr>
                        <th>
                            User ID
                        </th>
                        <th>
                            Timestamp
                        </th>
                        <th>
                            App_start_date
                        </th>
                        <th>
                            Study ID
                        </th>
                        <th>
                            Coached By
                        </th>
                    </tr>
                @foreach($output as $entry)
                    <?php $user = App\User::find($entry->user_id) ?>
                    <tr>
                        <td>
                            {{ $user->user_id }}
                        </td>
                        <td>
                            {{ $entry->timestamp }}
                        </td>
                        <td>
                            {{ $user->app_start_date }}
                        </td>
                        <td>
                            {{ $user->study_id }}
                        </td>
                        <td>
                            {{ $user->coached_by }}
                        </td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
