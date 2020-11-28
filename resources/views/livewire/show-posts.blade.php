
<div class="flex flex-col items-center justify-center">

    <div class="mt-16 w-1/2 flex items-center">
        <span class="ml-4 font-semibold">Show-posts: </span>
{{--        <span class="ml-4 font-semibold">Show-posts: {{ $contact['vorname'] }}</span>--}}
        <table>
            <tbody>
            <tr>
                <td>Anrede</td>
                <td>{{ $puser['anrede'] }}</td>
            </tr>
            <tr>
                <td>Vorname</td>
                <td>{{ $puser['vorname'] }}</td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td>{{ $puser['nachname'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
