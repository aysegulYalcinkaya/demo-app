
        <input autocomplete="off" class="shadow appearance-none border rounded w-full md:w-3/5 py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               name="search" id="search" type="text" placeholder="Search for establishment, address, city..." value="{{ $search }}">
        <select name="neighbourhood" class="shadow appearance-none border rounded w-full md:w-1/5 py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select neighbourhood</option>
            @foreach($neighbourhoods as $neighbourhood)
                <option value="{{ $neighbourhood }}" {{ ($neighbourhood==$selected_neighbourhood?"selected":"") }}>{{ $neighbourhood }}</option>
            @endforeach
        </select>
        <label for="inside" class="ml-5">
            <input type="checkbox" {{ $indoor=="1"?"checked":"" }} name="indoor" value="1" class="shadow appearance-none border rounded py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            Indoor?
        </label>
        <div class="float-right">
            <button type="submit" class="ml-5 bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Search</button>
        </div>

<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('#search').typeahead({
        source: function (query, process) {
            return $.get(path, {query: query}, function (data) {
                return process(data);
            });
        },
        items: 'all'
    });
</script>
