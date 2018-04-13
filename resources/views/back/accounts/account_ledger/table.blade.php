@foreach($account_ledgerdetails as $account_ledger)
    <tr>      

        <td>{{ $account_ledger->id }}</td>
        <td>{{ $account_ledger->account_groups->group_name }}</td>
        <td>{{ $account_ledger->account_subgroups->subgroup_name }}</td>
        <td>{{ $account_ledger->account_code }}</td>
        <td>{{ $account_ledger->account_name }}</td>       
        <td>{{ $account_ledger->currency_code }}</td>
        <td class="text-right">{{ $account_ledger->opening_bal }}</td>
        <td>{{ $account_ledger->openingbal_type }}</td>

        <td align="center">   
            <a class="btn btn-warning btn-xs btn-block" href="{{ route('account_ledger.edit', [$account_ledger->id]) }}" role="button" title="@lang('Edit') " style = "display:inline"><span class="fa fa-edit" ></span></a>

            <a class="btn btn-danger btn-xs btn-block" href="{{ route('account_ledger.destroy', [$account_ledger->id]) }}" role="button" title="@lang('Destroy')" style = "display:inline"><span class="fa fa-remove"></span></a>          
        </td>
    </tr>
@endforeach


