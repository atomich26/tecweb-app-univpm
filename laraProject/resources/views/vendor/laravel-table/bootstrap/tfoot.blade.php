<div class="table-footer-bottom">
    <tr{{ classTag($table->trClasses) }}>
        <td{{ classTag('bg-light', $table->tdClasses) }}{{ htmlAttributes($table->columnsCount() > 1 ? ['colspan' => $table->columnsCount() + 1] : null) }}>
            <div class="d-flex table-foot-container justify-content-between flex-wrap py-2">
                {{-- navigation --}}
                <div class="d-flex align-items-center px-3 py-1 navigation-container">
                    <div><h3>{!! $table->navigationStatus() !!}</h3></div>
                </div>
                {{-- pagination --}}
                <div class="d-flex align-items-center mb-n3 px-3 py-1 pagination-container">
                    {!! $table->list->links() !!}
                </div>
            </div>
        </td>
    </tr>
</div>
