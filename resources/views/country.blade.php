@foreach($data as $d)
    <table>
        <tr>
            <th>website</th>
            <th>city</th>
            <th>address</th>
            <th>office_hours</th>
            <th>note</th>
            <th>type</th>
            <th>emails</th>
            <th>phones</th>
        </tr>
        <tr>
            <td>{{$d['website']}}</td>
            <td>{{$d['city']}}</td>
            <td>{{$d['address']}}</td>
            <td>{{$d['office_hours']}}</td>
            <td>{{$d['note']}}</td>
            <td>{{$d['type']['name']}}</td>
            <td>@foreach($d['emails'] as $k)
                {{$k['address']}}
            @endforeach</td>
            <td>@foreach($d['phones'] as $k)
            {{$k['number']}}
            @endforeach</td>
        </tr>
    </table>
@endforeach
