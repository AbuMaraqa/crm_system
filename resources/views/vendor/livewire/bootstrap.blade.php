@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp


<div class="col-12">
    @if ($paginator->hasPages())
        <div class="bb-pro-pagination">
            <p>Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of {{ $paginator->total() }} item(s)</p>
            <ul>
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active">
                                    <a href="javascript:void(0)">{{ $page }}</a>
                                </li>
                            @else
                                <li>
                                    <a type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                        <li>
                            <a type="button" class="next" wire:click="nextPage('{{ $paginator->getPageName() }}')" aria-label="@lang('pagination.next')">
                                @lang('pagination.next')
                            </a>
                        </li>

                @else
                        <li class="next">
                            <a type="button" class="next" >
                                @lang('pagination.next')
                            </a>
                        </li>
                @endif
            </ul>
        </div>
    @endif
</div>
