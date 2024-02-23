@extends('include.header')


<div class="flex flex-col gap-24">
    <div class="flex flex-col w-48 ml-[1800px] mt-24  ">
        <a href="taskForm"><button  id="btn" class="border-2 px-2 py-2  rounded-2xl font-semibold text-white bg-emerald-950 ">
      Ajouter une task
    </button></a>
    </div>


   <div class="flex flex-wrap w-[90%] m-auto gap-x-4 ">
        @foreach ($task as $item)
            
        <div
        class="bg-gray-800 shadow-[0_2px_18px_-6px_rgba(0,0,0,0.2)] w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4">

            <div class="px-4 my-6">
                <h3 class="text-lg text-white font-semibold">{{ $item->name }}</h3>
                <p class="mt-2 text-sm text-gray-400">{{ $item->description }}</p>
                        <div class="flex gap-2 ml-[240px]">
                            <div>
                                <button type="button"
                                class="px-2 py-2 mt-4 rounded text-white text-sm tracking-wider font-semibold border-none outline-none bg-green-600 hover:bg-blue-700 active:bg-blue-600">edit</button>
                            </div>
                            <form method="post" action="/delete/{{ $item->id }}">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="px-2 py-2 mt-4 rounded text-white text-sm tracking-wider font-semibold border-none outline-none bg-red-600 hover:bg-blue-700 active:bg-blue-600">delete</button>
                            </form>
                            
                        </div>
            </div>
            
        </div>
        @endforeach
   </div>
</div>