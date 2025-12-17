// Mobile menu toggle
document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
});

// Close mobile menu when clicking on a link
document.querySelectorAll('#mobile-menu a').forEach(link => {
    link.addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.add('hidden');
    });
});

// Back to top button
const backToTopBtn = document.getElementById('back-to-top');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        backToTopBtn.style.display = 'block';
        backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
        backToTopBtn.classList.add('opacity-100');
    } else {
        backToTopBtn.classList.remove('opacity-100');
        backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
        setTimeout(() => {
            backToTopBtn.style.display = 'none';
        }, 300);
    }
});

backToTopBtn?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Smooth form validation
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', (e) => {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                isValid = false;
            } else {
                input.classList.remove('border-red-500');
            }
        });
        
        if (!isValid) e.preventDefault();
    });
});

// One-way / round-trip toggle (home search)
(() => {
    const oneWayLabel = document.getElementById('trip-one-way-label');
    const roundTripLabel = document.getElementById('trip-round-trip-label');
    const returnWrap = document.getElementById('return-date-wrap');
    const outboundDate = document.getElementById('outbound-date');
    const returnDate = document.getElementById('return-date');

    if (!oneWayLabel || !roundTripLabel || !returnWrap || !outboundDate || !returnDate) return;

    const oneWayInput = oneWayLabel.querySelector('input[type="radio"]');
    const roundTripInput = roundTripLabel.querySelector('input[type="radio"]');
    if (!oneWayInput || !roundTripInput) return;

    const applyPillStyles = () => {
        const activeClasses = ['bg-white', 'shadow-sm', 'text-gray-900'];
        const inactiveClasses = ['text-gray-600', 'hover:text-gray-900'];

        const setLabelState = (label, active) => {
            label.classList.remove(...activeClasses, ...inactiveClasses);
            if (active) {
                label.classList.add(...activeClasses);
            } else {
                label.classList.add(...inactiveClasses);
            }
        };

        setLabelState(oneWayLabel, oneWayInput.checked);
        setLabelState(roundTripLabel, roundTripInput.checked);
    };

    const syncReturnMin = () => {
        const dep = outboundDate.value;
        if (dep) {
            returnDate.min = dep;
            if (returnDate.value && returnDate.value < dep) {
                returnDate.value = dep;
            }
        }
    };

    const applyTripMode = () => {
        const isRoundTrip = roundTripInput.checked;
        returnWrap.classList.toggle('hidden', !isRoundTrip);
        returnDate.required = isRoundTrip;
        if (!isRoundTrip) {
            returnDate.value = '';
        } else {
            syncReturnMin();
        }
        applyPillStyles();
    };

    // Ensure initial state is styled
    applyTripMode();

    oneWayInput.addEventListener('change', applyTripMode);
    roundTripInput.addEventListener('change', applyTripMode);
    outboundDate.addEventListener('change', () => {
        syncReturnMin();
        if (roundTripInput.checked) applyTripMode();
    });
})();
