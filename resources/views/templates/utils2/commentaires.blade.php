<form action="/comment" method="POST" class="bg-gray-100 p-4 rounded-lg">
    @csrf
    <textarea name="comment" id="comment" cols="30" rows="10" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
    <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Submit</button>
</form>