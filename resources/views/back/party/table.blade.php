@foreach($partydetails as $party)
    <tr>      

        <td>{{ $party->id }}</td>
        <td>{{ $party->party_code }}</td>
        <td>{{ $party->party_name }}</td>
        <td>{{ $party->address }}</td>
        <td>{{ $party->email }}</td>
        <td>{{ $party->cities->city }}</td>
        <td>{{ $party->currency_code }}</td>
        <td class="text-right">{{ $party->opening_bal }}</td>
        <td>{{ $party->openingbal_type }}</td>
        <td>{{ $party->remarks }}</td>

        <td align="center">   
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('party.edit', [$party->id]) }}" role="button" title="@lang('Edit') " style = "display:inline"><span class="fa fa-edit" ></span></a>

            <a class="btn btn-danger btn-xs btn-block" href="{{ route('party.destroy', [$party->id]) }}" role="button" title="@lang('Destroy')" style = "display:inline"><span class="fa fa-remove"></span></a>          
        </td>
    </tr>
@endforeach


