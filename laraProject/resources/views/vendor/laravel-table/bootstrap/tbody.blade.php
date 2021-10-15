<tbody>
    @if($table->list->isEmpty())
        <tr{{ classTag($table->trClasses) }}>
            <td{{ classTag($table->tdClasses, 'text-center', 'p-3', 'full-height') }}{{ htmlAttributes($table->columnsCount() > 1 ? ['colspan' => $table->columnsCount()] : null) }} scope="row">
                <div><span class="text-info icon-alert">
                    {!! config('laravel-table.icon.empty') !!}
                </span>
                <h2>@lang('laravel-table::laravel-table.emptyTable')</h2></div>
            </td>
        </tr>
    @else
        @foreach($table->list as $model)
            <tr{{ classTag($table->trClasses, $model->conditionnalClasses, $model->disabledClasses) }}>
                @if($table->rowsSelection->has('closure'))
                    @php
                        $canSelect = ($table->rowsSelection['closure'])($model);
                        $attribute = $table->rowsSelection['attribute'];
                    @endphp 
                    <td class="align-middle text-center select-box">
                        @if($canSelect)
                            {!! Form::checkbox('', $model->$attribute, false, ['class' => 'selector']) !!}
                        @endif
                    </td>
                @endif
                @foreach($table->columns as $columnKey => $column)
                    @php
                        $value = $model->{$column->databaseDefaultColumn};
                        $customValue = $column->valueClosure ? ($column->valueClosure)($model, $column) : null;
                        $html = $column->htmlClosure ? ($column->htmlClosure)($model, $column) : null;
                        $link = $column->url instanceof Closure ? ($column->url)($model, $column) : ($column->url !== true
                            ? $column->url 
                            : ($customValue ? $customValue : $value));
                        $showIcon = $column->icon && (($customValue || $value) || $column->displayIconWhenNoValue);
                        $showLink = $link && ($customValue || $value || $showIcon);
                        $showButton = $column->buttonClasses && ($value || $customValue || $showIcon);
                    @endphp
                    <td{{ classTag($table->tdClasses, $column->classes) }}{{ htmlAttributes($columnKey === 0 ? ['scope' => 'row'] : null) }}>
                        {{-- custom html element --}}
                        @if($html)
                            {!! $html !!}
                        @else
                            {{-- link --}}
                            @if($showLink)
                                <a href="{{ $link }}" title="{{ $customValue ? $customValue : $value }}">
                            @endif
                            {{-- button start--}}
                            @if($showButton)
                                <button{{ classTag(
                                    $column->buttonClasses,
                                    $value ? Str::slug(strip_tags($value), '-') : null,
                                    $customValue ? Str::slug(strip_tags($customValue), '-') : null
                                ) }}>
                            @endif
                                {{-- icon--}}
                                @if($showIcon)
                                    {!! $column->icon !!}
                                @endif
                                {{-- custom value --}}
                                @if($customValue)
                                    {{ $customValue }}
                                {{-- string limit --}}
                                @elseif($column->stringLimit)
                                    {{ Str::limit(strip_tags($value), $column->stringLimit) }}
                                {{-- datetime format --}}
                                @elseif($column->dateTimeFormat)
                                    {{ $value
                                        ? \Carbon\Carbon::parse($value)->format($column->dateTimeFormat)
                                        : null }}
                                {{-- basic value --}}
                                @else
                                    {!! $value !!}
                                @endif
                            {{-- button end --}}
                            @if($showButton)
                                </button>
                            @endif
                            {{-- link end --}}
                            @if($showLink)
                                </a>
                            @endif
                        @endif
                    </td>
                @endforeach
                {{-- actions --}}
                @if(($table->isRouteDefined('edit') || $table->isRouteDefined('destroy') || $table->isRouteDefined('show')))
                    <td{{ classTag($table->tdClasses) }}>
                        @if(! $model->disabledClasses)
                            <div class="d-flex actions-buttons">
                                {{-- show button --}}
                                @if($table->isRouteDefined('show'))
                                    <form id="show-{{ $model->getKey() }}"
                                          role="form"
                                          method="GET"
                                          action="{{ $table->route('show', [$model]) }}">
                                        <button{{ classTag('btn', 'btn-link', 'p-0', 'text-primary', $model->disabledClasses ? 'disabled' : null) }} type="submit" title="@lang('laravel-table::laravel-table.show')"{{ htmlAttributes($model->disabledClasses ? ['disabled' => 'disabled'] : null) }}>
                                            {!! config('laravel-table.icon.show') !!}
                                        </button>
                                    </form>
                                @endif
                                {{-- edit button --}}
                                @if($table->isRouteDefined('edit'))
                                    <form id="edit-{{ $model->getKey() }}"
                                          class="ml-2"
                                          role="form"
                                          method="GET"
                                          action="{{ $table->route('edit', [$model]) }}">
                                        <button{{ classTag('btn', 'btn-link', 'p-0', 'text-primary', $model->disabledClasses ? 'disabled' : null) }} type="submit" title="@lang('laravel-table::laravel-table.edit')"{{ htmlAttributes($model->disabledClasses ? ['disabled' => 'disabled'] : null) }}>
                                            {!! config('laravel-table.icon.edit') !!}
                                        </button>
                                    </form>
                                @endif
                                {{-- destroy button --}}
                                @if($table->isRouteDefined('destroy'))
                                    <form id="destroy-{{ $model->getKey() }}"
                                          class="ml-2 destroy"
                                          role="form"
                                          method="POST"
                                          action="{{ $table->route('destroy', [$model]) }}">
                                        @csrf()
                                        @method('DELETE')
                                        <button{{ classTag('btn', 'btn-link', 'p-0', 'text-danger', $model->disabledClasses ? 'disabled' : null) }} type="submit" title="@lang('laravel-table::laravel-table.destroy')"{{ htmlAttributes($model->destroyConfirmationAttributes, $model->disabledClasses ? ['disabled' => 'disabled'] : null) }}>
                                            {!! config('laravel-table.icon.destroy') !!}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
        @include('laravel-table::' . $table->resultsComponentPath)
    @endif
</tbody>


