<div class="search flex items-center mb-2 relative">
    <form action="{{url('/post-search')}}" method="POST"class="w-full">
        {{ csrf_field() }}
        <input onkeyup="autocomplet()" type="text" name="name"  placeholder="Find any news or articles" class="w-full py-3 px-8 rounded" value="{{old('name')}}" autofocus>
        <span class="absolute pin-x pin-t mt-3 ml-2 text-grey-dark">
            <svg class="h-5 w-5 fill-current"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18pt" height="18pt" viewBox="0 0 18 18" version="1.1"><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill-opacity:1;" d="M 6.75 1.5 C 3.824219 1.5 1.5 3.824219 1.5 6.75 C 1.5 9.675781 3.824219 12 6.75 12 C 8.042969 12 9.214844 11.539063 10.125 10.78125 L 10.5 11.15625 L 10.5 11.765625 L 15.234375 16.5 L 16.5 15.234375 L 11.765625 10.5 L 11.109375 10.5 L 10.757813 10.148438 C 11.527344 9.234375 12 8.054688 12 6.75 C 12 3.824219 9.675781 1.5 6.75 1.5 Z M 6.75 3 C 8.851563 3 10.5 4.648438 10.5 6.75 C 10.5 8.851563 8.851563 10.5 6.75 10.5 C 4.648438 10.5 3 8.851563 3 6.75 C 3 4.648438 4.648438 3 6.75 3 Z "/></g></svg>
        </span>
    </form>
</div>