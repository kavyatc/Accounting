@foreach($cash_bookdetails as $cash_book)
    <tr>   
        <td>{{ $cash_book->voucherno }}</td>
        <td>{{ $cash_book->accountdate->format('d-m-Y') }}</td>
        <td>{{ $cash_book->trans_type }}</td>
        <td>{{ $cash_book->narration }}</td>
        <td>{{ $cash_book->currency_code }}</td>
        <td class="text-right">{{ $cash_book->amount }}</td>
        <td class="text-right">{{ $cash_book->amount }}</td>
        <td class="text-right">{{ $cash_book->amount }}</td>
        <td>{{ $cash_book->trans_type }}</td>

        <td align="center">   
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('cash_book.edit', [$cash_book->id]) }}" role="button" title="@lang('Edit') " style = "display:inline"><span class="fa fa-edit" ></span></a>

            <a class="btn btn-danger btn-xs btn-block" href="{{ route('cash_book.destroy', [$cash_book->id]) }}" role="button" title="@lang('Destroy')" style = "display:inline"><span class="fa fa-remove"></span></a>          
        </td>
    </tr>
@endforeach


