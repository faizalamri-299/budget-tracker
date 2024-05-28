@props([
    'title' => 'title',
    'slot' => '',
])

@extends('layouts.base', ['title' => $title])

@section('body')
    <nav class="bg-white border-gray-200 dark:bg-gray-900" x-data="{ isOpen: false }">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <x-logo class="w-auto h-6 mx-auto text-lime-600" />
                <span class="self-center text-lg font-semibold dark:text-white">Budget Tracker</span>
            </a>
            <div class="md:hidden">
                <button @click="isOpen = !isOpen"
                    class="inline-flex items-center p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="w-5 h-5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="w-5 h-5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path fill="currentColor"
                            d="M14.17 5.17L13.41 4.41L10 7.83L6.59 4.41L5.83 5.17L9.24 8.59L5.83 12L6.59 12.76L10 9.34L13.41 12.76L14.17 12L10.76 8.59L14.17 5.17Z" />
                    </svg>
                </button>
            </div>
            <div class="hidden md:flex items-center">
                <ul class="flex space-x-6">
                    <x-navigation.items route="home">Dashboard</x-navigation.items>
                    <x-navigation.items route="expense.index">Expenses</x-navigation.items>
                </ul>
                <button
                    @click="if(confirm('Are you sure you want to sign out?')) { document.getElementById('logout-form').submit(); }"
                    class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline transition ease-in-out duration-150 ml-6"
                    aria-label="Sign out">
                    Sign out
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <div :class="{ 'block': isOpen, 'hidden': !isOpen }" class="w-full md:hidden">
            <ul class="font-medium flex flex-col p-4 bg-gray-100 dark:bg-gray-800">
                <x-navigation.items route="home">Dashboard</x-navigation.items>
                <x-navigation.items route="expense.index">Expenses</x-navigation.items>
                <li class="px-2">
                    <button
                        @click="if(confirm('Are you sure you want to sign out?')) { document.getElementById('logout-form').submit(); }"
                        class="font-medium text-red-600 hover:text-red-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        aria-label="Sign out">
                        Sign out
                    </button>
                </li>
            </ul>
        </div>
    </nav>




    <div class="min-h-full max-w-screen-xl container mx-auto py-4">
        <header class="bg-white mb-4">
            <div class="">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 px-4">{{ $title }}</h1>
            </div>
        </header>
        <main>
            <div class="">
                {{ $slot }}
            </div>
        </main>
    </div>
@endsection
