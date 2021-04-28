<div>
    
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">

            <div class="flex-1 flex items-center justify-between">
                <div class="flex space-x-4 items-center">

                    @if ($paginator->hasPages())
                        <!-- per page options -->
                        <div class="flex space-x-2 items-center mt-3">
                            <label class="text-gray-700 leading-5">Per Page</label>
                            <select wire:model="perPage" class="p-1 border rounded-md bg-white">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    @endif
                    
                    <!-- showing total results -->
                    <div class="flex items-center">
                        <p class="text-gray-500 leading-5 my-auto">
                            <span>{!! __('Showing') !!}</span>
                            <span class="font-medium">{{ $paginator->firstItem() }}</span>
                            <span>{!! __('to') !!}</span>
                            <span class="font-medium">{{ $paginator->lastItem() }}</span>
                            <span>{!! __('of') !!}</span>
                            <span class="font-medium">{{ $paginator->total() }}</span>
                            <span>{!! __('results') !!}</span>
                        </p>
                    </div>

                </div>


                <!-- page numbers and next / previous -->
                @if ($paginator->hasPages())
                    <div class="flex items-center">


                        <span class="relative z-0 inline-flex shadow-sm">
                            <span>
                                {{-- Previous Page Link --}}
                                @if ($paginator->onFirstPage())
                                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                        <span class="relative inline-flex items-center px-2 py-2 font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </span>
                                @else
                                    <button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="relative inline-flex items-center px-2 py-2 font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @endif
                            </span>

                            {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <span aria-disabled="true">
                                        <span class="relative inline-flex items-center px-4 py-4 -ml-px font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                                    </span>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <span wire:key="paginator-page{{ $page }}">
                                            @if ($page == $paginator->currentPage())
                                                <span aria-current="page">
                                                    <span class="relative inline-flex items-center px-4 py-4 -ml-px font-bold text-blue-500 bg-white border-2 border-blue-500 cursor-default leading-5">{{ $page }}</span>
                                                </span>
                                            @else
                                                <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-4 -ml-px font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                    {{ $page }}
                                                </button>
                                            @endif
                                        </span>
                                    @endforeach
                                @endif
                            @endforeach

                            <span>
                                {{-- Next Page Link --}}
                                @if ($paginator->hasMorePages())
                                    <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                @else
                                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                        <span class="relative inline-flex items-center px-2 py-2 -ml-px font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </span>
                                @endif
                            </span>
                        </span>
                    </div>
                @endif
                        
            </div>
        </nav>
    
</div>