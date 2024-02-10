@extends('layouts.base')
@section('footer')
<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto flex flex-wrap justify-between px-4">
        <div class="w-full md:w-1/2 lg:w-1/4 mb-8">
            <h3 class="text-xl font-semibold mb-4">About Us</h3>
            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et tellus odio.</p>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 mb-8">
            <h3 class="text-xl font-semibold mb-4">Services</h3>
            <ul class="list-none">
                <li><a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">Web Design</a></li>
                <li><a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">Graphic Design</a></li>
                <li><a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">Digital Marketing</a></li>
                <li><a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">SEO</a></li>
            </ul>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 mb-8">
            <h3 class="text-xl font-semibold mb-4">Contact</h3>
            <p class="text-sm">123 Street, City, Country</p>
            <p class="text-sm">Email: info@example.com</p>
            <p class="text-sm">Phone: +123 456 789</p>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4 mb-8">
            <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
            <div class="flex space-x-4">
                <a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.372 0 0 5.372 0 12c0 6.628 5.372 12 12 12s12-5.372 12-12c0-6.628-5.372-12-12-12zm5.01 18.597c.007.16.01.32.01.48 0 4.43-3.366 9.55-9.55 9.55-1.91 0-3.683-.56-5.177-1.523.265.03.536.045.808.045 1.586 0 3.04-.54 4.202-1.447-1.478-.03-2.72-1-3.156-2.342.206.04.42.062.64.062.307 0 .606-.043.89-.123-1.56-.314-2.74-1.69-2.74-3.348V9.332c.455.252.98.404 1.54.422-.915-.61-1.52-1.65-1.52-2.82 0-.622.166-1.207.455-1.71 1.674 2.05 4.17 3.39 7.005 3.532-.058-.252-.087-.513-.087-.78 0-2.383 1.94-4.322 4.322-4.322 1.244 0 2.37.524 3.16 1.363.985-.196 1.912-.556 2.748-1.052-.322 1.014-.996 1.86-1.877 2.404.863-.102 1.677-.332 2.438-.67-.568.834-1.28 1.57-2.113 2.155z"/></svg>
                </a>
                <a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.372 0 0 5.372 0 12c0 6.628 5.372 12 12 12s12-5.372 12-12c0-6.628-5.372-12-12-12zm5.01 18.597c.007.16.01.32.01.48 0 4.43-3.366 9.55-9.55 9.55-1.91 0-3.683-.56-5.177-1.523.265.03.536.045.808.045 1.586 0 3.04-.54 4.202-1.447-1.478-.03-2.72-1-3.156-2.342.206.04.42.062.64.062.307 0 .606-.043.89-.123-1.56-.314-2.74-1.69-2.74-3.348V9.332c.455.252.98.404 1.54.422-.915-.61-1.52-1.65-1.52-2.82 0-.622.166-1.207.455-1.71 1.674 2.05 4.17 3.39 7.005 3.532-.058-.252-.087-.513-.087-.78 0-2.383 1.94-4.322 4.322-4.322 1.244 0 2.37.524 3.16 1.363.985-.196 1.912-.556 2.748-1.052-.322 1.014-.996 1.86-1.877 2.404.863-.102 1.677-.332 2.438-.67-.568.834-1.28 1.57-2.113 2.155z"/></svg>
                </a>
                <a href="#" class="text-sm hover:text-gray-400 transition duration-300 ease-in-out">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.372 0 0 5.372 0 12c0 6.628 5.372 12 12 12s12-5.372 12-12c0-6.628-5.372-12-12-12zm5.01 18.597c.007.16.01.32.01.48 0 4.43-3.366 9.55-9.55 9.55-1.91 0-3.683-.56-5.177-1.523.265.03.536.045.808.045 1.586 0 3.04-.54 4.202-1.447-1.478-.03-2.72-1-3.156-2.342.206.04.42.062.64.062.307 0 .606-.043.89-.123-1.56-.314-2.74-1.69-2.74-3.348V9.332c.455.252.98.404 1.54.422-.915-.61-1.52-1.65-1.52-2.82 0-.622.166-1.207.455-1.71 1.674 2.05 4.17 3.39 7.005 3.532-.058-.252-.087-.513-.087-.78 0-2.383 1.94-4.322 4.322-4.322 1.244 0 2.37.524 3.16 1.363.985-.196 1.912-.556 2.748-1.052-.322 1.014-.996 1.86-1.877 2.404.863-.102 1.677-.332 2.438-.67-.568.834-1.28 1.57-2.113 2.155z"/></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-8 text-sm text-center">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </div>
</footer>
@endsection