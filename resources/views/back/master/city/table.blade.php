@foreach($citydetails as $city)
    <tr>      

        <td class="id">{{ $city->id }}</td>
        <td class="city_code">{{ $city->city_code }}</td>
        <td class="city_name">{{ $city->city_name }}</td>       
        <td align="center">   
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('city.edit', [$city->id]) }}" role="button" title="@lang('Edit') " style = "display:inline"><span class="fa fa-edit" ></span></a>

            <a class="btn btn-danger btn-xs btn-block" href="{{ route('city.destroy', [$city->id]) }}" role="button" title="@lang('Destroy')" style = "display:inline"><span class="fa fa-remove"></span></a>          
        </td>
      
    </tr>
@endforeach

