@if ($products->lastPage() > 1)
    <ul class="pagination">
        <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $products->url($products->currentPage()-1) }}">
                <i class="icofont-arrow-right"></i>
            </a>
        </li>
        @for ($i = 1; $i <= $products->lastPage(); $i++)
            <li class="page-item">
                <a class="page-link {{ ($products->currentPage() == $i) ? ' active' : '' }}" 
                    href="{{ $products->url($i) }}">{{ $i }}
                </a>
            </li>
        @endfor
        <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $products->url($products->currentPage()+1) }}">
                <i class="icofont-arrow-left"></i>
            </a>
        </li>
    </ul>
@endif