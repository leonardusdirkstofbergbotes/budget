<div class="w-screen bg-white p-2 border-b border-blue-400 shadow-md flex space-x-10 items-center">

    <img class="h-12 w-12" src="{{ url('/images/budget_icon.png') }}">

    <div>
        <a href="{{ route('budget-item') }}" class="text-gray-500 hover:text-gray-700 cursor-pointer text-lg hover:no-underline">Budget</a>    
    </div>

    <div>
        <a href="{{ route('budget-log') }}" class="text-gray-500 hover:text-gray-700 cursor-pointer text-lg hover:no-underline">Log</a>    
    </div>

</div>