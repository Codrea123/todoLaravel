<div class="antialiased  text-gray-900 font-sans overflow-x-hidden hidden modal absolute top-0 left-0 w-full">
    <div class="relative px-4 min-h-screen md:flex md:items-center md:justify-center">
        <div class="bg-black opacity-25 w-full h-full absolute z-10 inset-0"></div>
        <div class="bg-white rounded-lg md:max-w-md md:mx-auto p-4 fixed inset-x-0 bottom-0 z-50 mb-4 mx-4 md:relative">
            <div class="md:flex items-center">

                <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left">
                    <p class="font-bold">Create SubTask</p>
                        <form action="{{route('subTasks.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="task_id" value="{{$task->id ?? ''}}">
                            <div>
                                <label for="description">Description</label>
                                <input type="text" name="description" class="rounded-full">
                            </div>
                            <div>
                                <input type="hidden" name="completed" value="0">
                            </div>
                            <div class="text-center md:text-right mt-4 md:flex md:justify-end">
                            <button class="block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-green-500 text-white rounded-lg font-semibold text-sm md:ml-2 md:order-2" type="submit">Create</button>

                            <button class="block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-gray-200 rounded-lg font-semibold text-sm mt-4 md:mt-0 md:order-1 close">Cancel</button>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
