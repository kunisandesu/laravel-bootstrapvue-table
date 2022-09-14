


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ユニバーサルかけっこチャレンジ検索システム') }}
        </h2>
    </x-slot>



    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                   <div id="app">
                   <p class="example1">
                      <font size="3" color="white">
                         You're logged in!
                      </font>
                   </p>
                   <usersearch-component></usersearch-component>
                   </div>


                </div>
            </div>
        </div>




    </div>


</x-app-layout>

