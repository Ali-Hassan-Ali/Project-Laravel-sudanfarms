@if ($request_custmers->lastPage() > 1)
<ul class="pagination">
    <li class="page-item {{ ($request_custmers->currentPage() == 1) ? ' disabled' : '' }}">
        <a class="page-link" href="{{ $request_custmers->url($request_custmers->currentPage()-1) }}">
            <i class="icofont-arrow-right"></i>
        </a>
    </li>
    @for ($i = 1; $i <= $request_custmers->lastPage(); $i++)
        <li class="page-item">
            <a class="page-link {{ ($request_custmers->currentPage() == $i) ? ' active' : '' }}" 
                href="{{ $request_custmers->url($i) }}">{{ $i }}
            </a>
        </li>
    @endfor
    <li class="page-item {{ ($request_custmers->currentPage() == $request_custmers->lastPage()) ? ' disabled' : '' }}">
        <a class="page-link" href="{{ $request_custmers->url($request_custmers->currentPage()+1) }}">
            <i class="icofont-arrow-left"></i>
        </a>
    </li>
</ul>

@endif