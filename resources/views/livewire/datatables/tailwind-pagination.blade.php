<div class="flex overflow-hidden border border-gray-300 divide-x divide-gray-300 rounded pagination">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
    <button class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-100"
        disabled>
        <span>&laquo;</span>
    </button>
    @else
    <button wire:click="previousPage"
        id="pagination-desktop-page-previous"
        class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-50 dark:active:bg-red-600 dark:active:text-purple-600 dark:bg-gray-800 dark:text-gray-100">
        <span>&laquo;</span>
    </button>
    @endif

    <div class="divide-x divide-gray-300">
        @foreach ($elements as $element)
        @if (is_string($element))
        <button class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-100" disabled>
            <span>{{ $element }}</span>
        </button>
        @endif

        <!-- Array Of Links -->

        @if (is_array($element))
        @foreach ($element as $page => $url)
        <button wire:click="gotoPage({{ $page }})"
                id="pagination-desktop-page-{{ $page }}"
                class="-mx-1 relative inline-flex items-center px-4 py-2 text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 dark:active:bg-red-600 dark:active:text-purple-600 dark:text-gray-100 transition ease-in-out duration-150 {{ $page === $paginator->currentPage() ? 'bg-gray-200 dark:bg-gray-700' : 'bg-white dark:bg-gray-800' }}">
            {{ $page }}
            </button>
        @endforeach
        @endif
        @endforeach
    </div>

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
    <button wire:click="nextPage"
        id="pagination-desktop-page-next"
        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-red hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 dark:active:bg-red-600 dark:active:text-purple-600 dark:bg-gray-800 dark:text-gray-100">
        <span>&raquo;</span>
    </button>
    @else
    <button
        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white dark:bg-gray-800 dark:text-gray-100"
        disabled><span>&raquo;</span></button>
    @endif
</div>
