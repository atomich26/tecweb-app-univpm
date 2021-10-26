<thead>
    {{-- rows number / search --}}
    <tr{{ classTag($table->trClasses) }}>
        <td{{ classTag('bg-light', $table->tdClasses) }}{{ htmlAttributes($table->columnsCount() > 1 ? ['colspan' => $table->columnsCount()] : null) }}>
            <div class="table-head-container">
                <div class="flex-v-center">
                {{-- table title --}}
                @if(!is_null($table->title))
                    <h2 class="table-title">{!! $table->icon ?? '' !!} {{ $table->title }}</h2>
                @endif
                @if($table->rowsNumberSelectionActivation || ! $table->searchableColumns->isEmpty())
                    {{-- searching --}}
                    @if(count($table->searchableColumns))
                        <div class="searching thead-widget">
                            <form role="form" method="GET" action="{{ $table->route('index') }}">
                                <input type="hidden" name="{{ $table->rowsField }}" value="{{ $table->request->get($table->rowsField) }}">
                                <input type="hidden" name="{{ $table->sortByField }}" value="{{ $table->request->get($table->sortByField) }}">
                                <input type="hidden" name="{{ $table->sortDirField }}" value="{{ $table->request->get($table->sortDirField) }}">
                                @foreach($table->appendedHiddenFields as $appendedKey => $appendedValue)
                                    <input type="hidden" name="{{ $appendedKey }}" value="{{ $appendedValue }}">
                                @endforeach
                                <div class="input-group">
                                    <input class="form-control"
                                           type="text"
                                           name="{{ $table->searchField }}"
                                           value="{{ $table->request->get($table->searchField) }}"
                                           placeholder="@lang('laravel-table::laravel-table.search') {{ $table->searchableTitles() }}"
                                           aria-label="@lang('laravel-table::laravel-table.search') {{ $table->searchableTitles() }}">
                                    @if($table->request->get($table->searchField))
                                        <div class="input-group-append">
                                            <a class="input-group-text btn btn-link text-danger cancel-search"
                                               href="{{ $table->route('index', array_merge([
                                                    $table->searchField    => null,
                                                    $table->rowsField      => $table->request->get($table->rowsField),
                                                    $table->sortByField    => $table->request->get($table->sortByField),
                                                    $table->sortDirField   => $table->request->get($table->sortDirField)
                                                ], $table->appendedValues)) }}"
                                               title="@lang('laravel-table::laravel-table.cancelSearch')">
                                                <span>{!! config('laravel-table.icon.cancel') !!}</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="input-group-append">
                                            <button class="button" type="submit">
                                                {!! config('laravel-table.icon.search') !!}
                                            </button>                                    
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- rows number selection --}}
                    @if($table->rowsNumberSelectionActivation)
                        <div class="rows-number-selection thead-widget">
                            <form role="form" method="GET" action="{{ $table->route('index') }}">
                                <input type="hidden" name="{{ $table->searchField }}" value="{{ $table->request->get($table->searchField) }}">
                                <input type="hidden" name="{{ $table->sortByField }}" value="{{ $table->request->get($table->sortByField) }}">
                                <input type="hidden" name="{{ $table->sortDirField }}" value="{{ $table->request->get($table->sortDirField) }}">
                                @foreach($table->appendedHiddenFields as $appendedKey => $appendedValue)
                                    <input type="hidden" name="{{ $appendedKey }}" value="{{ $appendedValue }}">
                                @endforeach
                                <div class="input-group">
                                    <input class="form-control"
                                           type="number"
                                           name="{{ $table->rowsField }}"
                                           value="{{ $table->request->get($table->rowsField) }}"
                                           placeholder="@lang('laravel-table::laravel-table.rowsNumber')"
                                           aria-label="@lang('laravel-table::laravel-table.rowsNumber')"
                                           max="10"
                                           min="1">
                                    <div class="input-group-append">
                                        <div class="input-group-text py-0">
                                            <button class="button" type="submit">
                                                {!! config('laravel-table.icon.rowsNumber') !!}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    @yield('selected-items-actions')
                    </div>
                    <div class="flex-v-center">
                    @if(array_key_exists('bulk-destroy', $table->routes))
                        <div class="thead-widget bulkActionInput">
                            @php
                                $route = array($table->routes['bulk-destroy']['name']);
                                
                                if(array_key_exists('params', $table->routes['bulk-destroy']))
                                    $route = array_merge($route, $table->routes['bulk-destroy']['params']);
                            @endphp
                            {{ Form::open(array('route'=> $route,'method' => 'DELETE',
                                'id'=>'delete-selected-form', 'data-confirm' => 'Sei sicuro di voler eliminare :items elementi?'))}}
                                <input name="items" type="hidden" id="selectedRows" value="">
                                <button class="button bulkActionBtn" type="submit" value="Elimina selezionati">{!! config('laravel-table.icon.destroy') !!} Elimina selezionati</button>
                            {{ Form::close()}}
                        </div>
                    @endif
                    {{-- create button --}}
                    @if($table->isRouteDefined('create'))
                        <div class="thead-widget">
                            <a href="{{ $table->route('create') }}"
                               class="button btn-create"
                               title="{{ __('laravel-table::laravel-table.create') }}">
                                {!! config('laravel-table.icon.create') !!}
                                {{ __('laravel-table::laravel-table.create') }}
                            </a>
                        </div>
                    @endif
                    </div>
                @endif
            </div>
        </td>
    </tr>
    {{-- column titles --}}
    <tr{{ classTag($table->trClasses, 'columns-title') }}>
        {{-- selector rows --}}
        @if($table->rowsSelection->has('closure'))
            <th class="text-center">{!! Form::checkbox('select-all', '', false, ['id' => 'selector-all']) !!}</th>
        @endif
        @foreach($table->columns as $column)
            <th{{ classTag($table->thClasses) }} scope="col">
                @if($column->isSortable)
                    <a class="d-flex"
                       href="{{ $table->route('index', array_merge([
                            $table->rowsField      => $table->request->get($table->rowsField),
                            $table->searchField    => $table->request->get($table->searchField),
                            $table->sortByField    => $column->databaseDefaultColumn,
                            $table->sortDirField   => $table->request->get($table->sortDirField) === 'desc' ? 'asc' : 'desc',
                        ], $table->appendedValues)) }}"
                       title="{{ $column->title }}">
                        <span>
                            {!! str_replace(' ', '&nbsp;', $column->title) !!}
                        </span>
                        @if($table->request->get($table->sortByField) === $column->databaseDefaultColumn
                            && $table->request->get($table->sortDirField) === 'asc')
                            <span class="sort asc">{!! config('laravel-table.icon.sortAsc') !!}</span>
                        @elseif($table->request->get($table->sortByField) === $column->databaseDefaultColumn
                            && $table->request->get($table->sortDirField) === 'desc')
                            <span class="sort desc">{!! config('laravel-table.icon.sortDesc') !!}</span>
                        @else
                            <span class="sort">{!! config('laravel-table.icon.sort') !!}</span>
                        @endif
                    </a>
                @else
                    {!! str_replace(' ', '&nbsp;', $column->title) !!}
                @endif
            </th>
        @endforeach
        @if($table->isRouteDefined('show') || $table->isRouteDefined('edit') || $table->isRouteDefined('destroy'))
            <th{{ classTag($table->thClasses,'text-right') }} scope="col">
                @lang('laravel-table::laravel-table.actions')
            </th>
        @endif
    </tr>
</thead>
