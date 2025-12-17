document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('.autocomplete-city');

    inputs.forEach(input => {
        // Wrapper for positioning
        const wrapper = document.createElement('div');
        wrapper.className = 'relative w-full';
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        // Suggestions container
        const suggestionsBox = document.createElement('ul');
        suggestionsBox.className = 'absolute z-50 w-full bg-white border border-gray-200 rounded-lg shadow-lg mt-1 max-h-60 overflow-y-auto hidden';
        wrapper.appendChild(suggestionsBox);

        let timeout = null;

        input.addEventListener('input', () => {
            clearTimeout(timeout);
            const query = input.value.trim();

            if (query.length < 1) {
                suggestionsBox.classList.add('hidden');
                return;
            }

            // Debounce
            timeout = setTimeout(async () => {
                try {
                    const response = await fetch(`index.php?route=api_cities&q=${encodeURIComponent(query)}`);
                    const cities = await response.json();

                    if (cities.length > 0) {
                        suggestionsBox.innerHTML = '';
                        cities.forEach(city => {
                            const li = document.createElement('li');
                            li.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700 font-medium';
                            
                            // Highlight matching part
                            const regex = new RegExp(`^(${query})`, 'gi');
                            const highlighted = city.replace(regex, '<span class="text-indigo-600 font-bold">$1</span>');
                            li.innerHTML = highlighted;

                            li.addEventListener('click', () => {
                                input.value = city;
                                suggestionsBox.classList.add('hidden');
                                // Trigger change event if needed for other scripts
                                const event = new Event('change');
                                input.dispatchEvent(event);
                            });

                            suggestionsBox.appendChild(li);
                        });
                        suggestionsBox.classList.remove('hidden');
                    } else {
                        suggestionsBox.classList.add('hidden');
                    }
                } catch (error) {
                    console.error('Error fetching cities:', error);
                }
            }, 300);
        });

        // Close on click outside
        document.addEventListener('click', (e) => {
            if (!wrapper.contains(e.target)) {
                suggestionsBox.classList.add('hidden');
            }
        });
    });
});
