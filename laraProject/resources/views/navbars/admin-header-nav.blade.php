<div class="divider"></div>

<nav id="navbar">
    <ul>
        <li>
            <a href="{{ route(Auth::user()->role . '.prodotti.table') }}"><i class="bi bi-box-seam"></i> Prodotti</a>
        </li>
        @can('isAdmin')
            <li>
                <a href="{{ route('admin.centri.table') }}"><i class="bi bi-headset"></i> Centri assistenza</a>
            </li>
            <li>
                <a href="{{ route('admin.faq.table') }}"> <i class="bi bi-question-circle"></i> FAQ</a>
            </li>
            <li>
                <a href="{{ route('admin.utenti.table') }}"><i class="bi bi-people"></i> Utenti</a>
            </li>
        @endcan
    </ul>
</nav>

