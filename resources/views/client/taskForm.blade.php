@extends('include.header')
<form action="{{ route('taskForm') }}" method="post">
    @csrf
    <div class="flex flex-col justify-center max-w-lg mx-auto mt-72 px-4 space-y-6 font-[sans-serif] text-[#333]">
        <div>
        
        <input name="name" type='text' placeholder='Name'
            class="px-4  py-2.5 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
        </div>
        <div>
        
        <input type='text-' name="description" placeholder='Large Input'
            class="px-4 mt-5 py-12 text-lg rounded-md bg-white border border-gray-400 w-full outline-blue-500" />
        </div>
        <button type="submit"
        class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
            <span class="ml-3">
                Add task 
            </span>
        </button>
    </div>
</form>