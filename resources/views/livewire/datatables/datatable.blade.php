<div>
    @if($beforeTableSlot)
        <div class="mt-8">
            @include($beforeTableSlot)
        </div>
    @endif
    <div class="relative">
        <div class="flex flex-wrap justify-between items-center mb-1">
            <div class="flex-grow h-10 flex items-center">
                @if($this->searchableColumns()->count())
                    <div class="w-full sm:w-96 flex rounded-md">
                        <div class="relative flex-grow focus-within:z-10">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="far fa-search h-5 w-5 text-gray-400"></i>
                            </div>
                            <input wire:model.debounce.500ms="search"
                                   class="form-input block bg-white focus:outline-none focus:ring focus:border-blue-300 w-full rounded-md pl-10 px-3 py-2 transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                   placeholder="Zoeken..."/>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button wire:click="$set('search', null)"
                                        class="text-gray-300 hover:text-red-600 focus:outline-none">
                                    <x-icons.x-circle class="h-5 w-5 stroke-current"/>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-2 mt-3 md:mt-0">
                <x-icons.cog wire:loading class="h-9 w-9 animate-spin text-gray-400"/>

                @if($exportable)
                    <div x-data="{ init() {
                    window.livewire.on('startDownload', link => window.open(link,'_blank'))
                } }" x-init="init">
                        <button wire:click="export"
                                class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-200 focus:outline-none">
                            <span>Export</span>
                            <x-icons.excel class="m-2"/>
                        </button>
                    </div>
                @endif

                @if($hideable === 'select')
                    @include('datatables::hide-column-multiselect')
                @endif
            </div>
        </div>

        @if($hideable === 'buttons')
            <div class="p-2 grid grid-cols-8 gap-2">
                @foreach($this->columns as $index => $column)
                    <button wire:click.prefetch="toggle('{{ $index }}')" class="px-3 py-2 rounded text-white text-xs focus:outline-none
                        {{ $column['hidden'] ? 'bg-blue-100 hover:bg-blue-300 text-blue-600' : 'bg-blue-500 hover:bg-blue-800' }}">
                        {{ $column['label'] }}
                    </button>
                @endforeach
            </div>
        @endif

        <div
            class="rounded-md max-w-screen overflow-x-scroll pt-3 scrollbar scrollbar-thumb-gray-500 scrollbar-track-gray-300 overflow-x-scroll hover:scrollbar-thumb-gray-800 {{-- scrollbar-thumb-rounded-full scrollbar-track-rounded-full --}}">
            <div class="rounded-md @unless($this->hidePagination) rounded-b-none @endif">
                <div class="table align-middle min-w-full pb-4">
                    @unless($this->hideHeader)
                        <div class="table-row divide-x divide-gray-200">
                            @foreach($this->columns as $index => $column)
                                @if($hideable === 'inline')
                                    @include('datatables::header-inline-hide', ['column' => $column, 'sort' => $sort])
                                @elseif($column['type'] === 'checkbox')
                                    <div
                                        class="relative table-cell h-12 w-48 overflow-hidden align-top px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex items-center focus:outline-none">
                                        <div
                                            class="px-3 py-1 rounded @if(count($selected)) bg-orange-400 @else bg-gray-200 @endif text-white text-center">
                                            {{ count($selected) }}
                                        </div>
                                    </div>
                                @else
                                    @include('datatables::header-no-hide', ['column' => $column, 'sort' => $sort])
                                @endif
                            @endforeach
                        </div>

                        <div class="table-row divide-x divide-blue-200 bg-blue-100">
                            @foreach($this->columns as $index => $column)
                                @if($column['hidden'])
                                    @if($hideable === 'inline')
                                        <div class="table-cell w-5 overflow-hidden align-top bg-blue-100"></div>
                                    @endif
                                @elseif($column['type'] === 'checkbox')
                                    <div
                                        class="w-32 overflow-hidden align-top bg-blue-100 px-6 py-5 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider flex h-full flex-col items-center space-y-2 focus:outline-none">
                                        <div>Alles selecteren</div>
                                        <div>
                                            <input type="checkbox" wire:click="toggleSelectAll"
                                                   @if(count($selected) === $this->results->total()) checked
                                                   @endif class="form-checkbox mt-1 h-4 w-4 text-blue-600 transition duration-150 ease-in-out"/>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-cell overflow-hidden align-top">
                                        @isset($column['filterable'])
                                            @if( is_iterable($column['filterable']) )
                                                <div wire:key="{{ $index }}">
                                                    @include('datatables::filters.select', ['index' => $index, 'name' => $column['label'], 'options' => $column['filterable']])
                                                </div>
                                            @else
                                                <div wire:key="{{ $index }}">
                                                    @include('datatables::filters.' . ($column['filterView'] ?? $column['type']), ['index' => $index, 'name' => $column['label']])
                                                </div>
                                            @endif
                                        @endisset
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    @forelse($this->results as $result)
                        <div
                            class="table-row p-1 divide-x divide-gray-200 hover:bg-blue-100 {{ isset($result->checkbox_attribute) && in_array($result->checkbox_attribute, $selected) ? 'bg-blue-200' : ($loop->even ? 'bg-blue-50' : 'bg-blue-50') }}">
                            @foreach($this->columns as $column)
                                @if($column['hidden'])
                                    @if($hideable === 'inline')
                                        <div class="table-cell w-5 overflow-hidden align-top"></div>
                                    @endif
                                @elseif($column['type'] === 'checkbox')
                                    @include('datatables::checkbox', ['value' => $result->checkbox_attribute])
                                @else
                                    <div
                                        class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-900 table-cell @if($column['align'] === 'right') text-right @elseif($column['align'] === 'center') text-center @else text-left @endif">
                                        {!! $result->{$column['name']} !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @empty
                        <p class="p-3 text-lg text-teal-600">
                            Er zijn geen resultaten gevonden...
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
        @unless($this->hidePagination)
            <div class="rounded-md rounded-t-none max-w-screen rounded-md border-b border-gray-200 bg-white">
                <div class="p-2 sm:flex items-center justify-between">
                    {{-- check if there is any data --}}
                    @if($this->results[1])
                        <div class="my-2 sm:my-0 flex items-center">
                            <select name="perPage"
                                    class="mt-1 form-select block rounded w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
                                    wire:model="perPage">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="99999999">Alles</option>
                            </select>
                        </div>

                        <div class="my-4 sm:my-0">
                            <div class="lg:hidden">
                                    <span
                                        class="space-x-2">{{ $this->results->links('datatables::tailwind-simple-pagination') }}</span>
                            </div>

                            <div class="hidden lg:flex justify-center">
                                <span>{{ $this->results->links('datatables::tailwind-pagination') }}</span>
                            </div>
                        </div>

                        <div class="flex justify-end text-gray-600">
                            Resultaten {{ $this->results->firstItem() }} - {{ $this->results->lastItem() }}
                            van {{ $this->results->total() }}
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
    @if($afterTableSlot)
        <div class="mt-8">
            @include($afterTableSlot)
        </div>
    @endif
</div>
