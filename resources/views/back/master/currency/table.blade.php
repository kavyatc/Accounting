@foreach($currencydetails as $currency)
    <tr>      

        <td class="id">{{ $currency->id }}</td>
        <td class="currency_code">{{ $currency->currency_code }}</td>
        <td class="currency_name">{{ $currency->currency_name }}</td>
        <td class="subcurrency">{{ $currency->subcurrency }}</td>
        <td align="center">   
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('currency.edit', [$currency->id]) }}" role="button" title="@lang('Edit') " style = "display:inline"><span class="fa fa-edit" ></span></a>

            <a class="btn btn-danger btn-xs btn-block" href="{{ route('currency.destroy', [$currency->id]) }}" role="button" title="@lang('Destroy')" style = "display:inline"><span class="fa fa-remove"></span></a>          
        </td>
      
    </tr>
@endforeach

