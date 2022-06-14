@if ($paginator->hasPages())
    <div class="col-sm-12">
        <div class="dataTables_paginate paging_bootstrap pagination">
            <ul>
                {{-- @dd($paginator->items()) --}}
                @foreach ($elements as $elementUrls)
                    @if (is_array($elementUrls))
                        <li class="prev {{ $paginator->onFirstPage() ? 'disabled' : '' }}"><a
                                href="{{ $paginator->previousPageUrl() }}">→ Prev</a></li>
                        @foreach ($elementUrls as $item => $url)
                            <li class="{{ $item == $paginator->currentPage() ? 'active' : '' }}"
                                style="{{ $item == $paginator->currentPage() ? 'border-color: green' : '' }}"><a
                                    href="{{ $url }}">{{ $item }}</a></li>
                        @endforeach
                        <li class="next {{ $paginator->hasMorePages() ? '' : 'disabled' }}"><a
                                href="{{ $paginator->nextPageUrl() }}">Next ← </a></li>
                    @endif
                @endforeach
                {{-- <li class="active"><a href="#">1</a></li> --}}
            </ul>
        </div>
    </div>
@endif
