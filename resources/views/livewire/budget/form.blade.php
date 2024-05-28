<div>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Set Your Monthly Budget
                    </h3>
                </div>
                <!-- Modal body -->
                <form id='budget-form' wire:submit="save">
                    <div class="mb-4">
                        <p class="text-sm text-gray-900 dark:text-white">
                            Please fill out your monthly budget before using the system. This is necessary to ensure
                            accurate tracking and management of your expenses.
                        </p>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-1">
                        <div>
                            <label for="amount"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monthly
                                Budget</label>
                            <input type="number" wire:model="amount" id="amount" step=".01"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter your budget" required>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 justify-end">
                        <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
