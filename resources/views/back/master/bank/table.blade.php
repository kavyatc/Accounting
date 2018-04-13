@foreach($bankdetails as $bank)
    <tr>      

        <td class="id">{{ $bank->id }}</td>        
        <td class="bank_name">{{ $bank->bank_name }}</td>       
        <td align="center">   
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('bank.edit', [$bank->id]) }}" role="button" title="@lang('Edit') " style = "display:inline"><span class="fa fa-edit" ></span></a>

            <a class="btn btn-danger btn-xs btn-block" href="{{ route('bank.destroy', [$bank->id]) }}" role="button" title="@lang('Destroy')" style = "display:inline"><span class="fa fa-remove"></span></a>          
        </td>
      
    </tr>
@endforeach

