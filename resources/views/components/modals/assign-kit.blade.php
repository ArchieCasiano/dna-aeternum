<div x-data="{ open: false }">
    <button @click="open = true" class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700 cursor-pointer">
        Assign Kit
    </button>

    <div x-show="open" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50" x-cloak>
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl relative overflow-y-auto max-h-[90vh]">
            <h2 class="text-xl font-semibold mb-4">Assign Kit to User</h2>

            <form method="POST" action="#">
                <div class="space-y-4 text-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>Kit Barcode</label>
                            <input type="text" name="barcode" class="w-full border p-2 rounded" required />
                        </div>
                        <div>
                            <label>User ID</label>
                            <input type="text" name="user_id" class="w-full border p-2 rounded" required />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>Height (feet)</label>
                            <input type="number" name="height_feet" class="w-full border p-2 rounded" />
                        </div>
                        <div>
                            <label>Height (inches)</label>
                            <input type="number" name="height_inches" class="w-full border p-2 rounded" />
                        </div>
                    </div>

                    <div>
                        <label>Weight</label>
                        <input type="number" name="weight" class="w-full border p-2 rounded" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>Overall Health</label>
                            <select name="overall_health" class="w-full border p-2 rounded">
                                <option>Fair</option>
                                <option>Excellent</option>
                                <option>Good</option>
                                <option>Poor</option>
                            </select>
                        </div>
                        <div>
                            <label>Mental Health</label>
                            <select name="mental_health" class="w-full border p-2 rounded">
                                <option>Fair</option>
                                <option>Excellent</option>
                                <option>Good</option>
                                <option>Poor</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="mt-6 flex justify-end gap-2">
                    <button type="button" @click="open = false"
                        class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Assign</button>
                </div>
            </form>

            <button @click="open = false"
                class="absolute top-2 right-4 text-xl text-gray-500 hover:text-black cursor-pointer">
                &times;
            </button>
        </div>
    </div>
</div>
