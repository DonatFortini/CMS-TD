@section('content')
<div class="pt-24 container mx-auto px-4 py-8 h-screen flex-col">
    <h1 class="text-3xl font-bold mb-6 text-center">Contact Us</h1>
    <form action="#" method="POST" class="space-y-4 mx-auto max-w-md">
        <div>
            <label for="name" class="block font-semibold mb-1">Your Name</label>
            <input type="text" id="name" name="name" placeholder="John Doe"
                class="w-full border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-400">
        </div>
        <div>
            <label for="email" class="block font-semibold mb-1">Your Email</label>
            <input type="email" id="email" name="email" placeholder="john@example.com"
                class="w-full border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-400">
        </div>
        <div>
            <label for="message" class="block font-semibold mb-1">Message</label>
            <textarea name="message" id="message" rows="5" placeholder="Write your message here..."
                class="w-full border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-blue-400"></textarea>
        </div>
        <div class="flex justify-center">
            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-300">Submit</button>
        </div>
    </form>
</div>
@endsection