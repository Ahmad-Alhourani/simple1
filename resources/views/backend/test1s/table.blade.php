<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
                
                 <th>@sortablelink('name', trans('labels.backend.test1s.table.name')) </th>
                
                 <th>@sortablelink('l_name', trans('labels.backend.test1s.table.l_name')) </th>
                
                 <th>@sortablelink('email', trans('labels.backend.test1s.table.email')) </th>
                
                 <th>{{ __('labels.backend.test1s.table.sms') }}</th>
                
            <th>{{ __('labels.general.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($test1s as $test1)
        <tr>
             
                <td>{{  $test1->name }}</td>  
                <td>{{  $test1->l_name }}</td>  
                <td>{{  $test1->email }}</td>  
                <td>{{  $test1->sms }}</td>  
                

               <td>{!! $test1->action_buttons !!}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>