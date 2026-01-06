import './bootstrap';

// Counter animation for stats
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter, .counter-4m');
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current >= target) {
                current = target;
                if (element.classList.contains('counter-4m')) {
                    element.textContent = target + 'M';
                } else {
                    element.textContent = Math.floor(target) + '+';
                }
            } else {
                if (element.classList.contains('counter-4m')) {
                    element.textContent = Math.floor(current) + 'M';
                } else {
                    element.textContent = Math.floor(current) + '+';
                }
                requestAnimationFrame(updateCounter);
            }
        };
        updateCounter();
    };
    
    // Use Intersection Observer to trigger animation when element comes into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
});

// Logo Carousel - Pure JavaScript (No Alpine.js needed)
document.addEventListener('DOMContentLoaded', function() {
    const items = [
        { src: "/mix/AI-and-partner.webp", alt: "AI & Partners", url: "https://www.ai-and-partners.com/" },
        { src: "/mix/CBR-Logo.webp", alt: "Circular Business Review", height: "72px", maxWidth: "146px", url: "https://www.circularbusinessreview.com/" },
        { src: "/mix/makka-logo.webp", alt: "Makkah Logo", url: "#" },
        { src: "/mix/gulftimes-logo.webp", alt: "Gulf Times", url: "https://www.gulf-times.com/" },
        { src: "/mix/energytalks-logo.webp", alt: "Energy Talks", url: "#" },
    ];

    const isRTL = document.documentElement.dir === 'rtl';

    // Initialize both desktop and mobile carousels
    initCarousel('sponsors-desktop', items, 5, 20);  // Desktop: 5 items per page
    initCarousel('sponsors-mobile', items, 1, 12);   // Mobile: 1 item per page

    function initCarousel(selector, items, desktopPerPage, gap) {
        const carouselContainer = document.querySelector(`[data-carousel="${selector}"]`);
        if (!carouselContainer) return;

        const track = carouselContainer.querySelector('.carousel-track');
        const dotsContainer = carouselContainer.querySelector('.carousel-dots');

        let currentPage = 0;
        let itemWidth = 0;

        // Render carousel items
        function renderItems() {
            track.innerHTML = '';
            items.forEach((item) => {
                const div = document.createElement('div');
                div.className = 'carousel-item';
                div.style.flexShrink = '0';
                
                // Use custom size or default
                const height = item.height || '40px';
                const maxWidth = item.maxWidth || '160px';
                const url = item.url;
                const hasUrl = url && url !== '#';
                
                // Create content with or without link based on URL
                let content = '';
                if (hasUrl) {
                    content = `
                        <a href="${url}" target="_blank" rel="noopener noreferrer" style="display: flex; align-items: center; justify-content: center; text-decoration: none; height: 100%; width: 100%;">
                            <img src="${item.src}" alt="${item.alt}" style="height: ${height}; max-width: ${maxWidth}; object-fit: contain; cursor: pointer;">
                        </a>
                    `;
                } else {
                    content = `
                        <img src="${item.src}" alt="${item.alt}" style="height: ${height}; max-width: ${maxWidth}; object-fit: contain;">
                    `;
                }
                
                div.innerHTML = `
                    <div style="display: flex; height: 80px; align-items: center; justify-content: center; background-color: white; border: 1px solid #e2e8f0; box-shadow: 0 6px 20px rgba(0,0,0,0.06); border-radius: 8px;">
                        ${content}
                    </div>
                `;
                track.appendChild(div);
            });
        }

        // Render dots
        function renderDots() {
            dotsContainer.innerHTML = '';
            const pageCount = Math.ceil(items.length / desktopPerPage);
            for (let i = 0; i < pageCount; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'carousel-dot';
                btn.style.height = '6px';
                btn.style.width = '40px';
                btn.style.borderRadius = '9999px';
                btn.style.transition = 'background-color 0.3s';
                btn.style.cursor = 'pointer';
                btn.style.border = 'none';
                btn.setAttribute('aria-label', `Go to slide ${i + 1}`);
                btn.style.backgroundColor = i === currentPage ? '#f97316' : '#cbd5e1';
                btn.addEventListener('click', () => goToPage(i));
                dotsContainer.appendChild(btn);
            }
        }

        function updateItemWidth() {
            const viewport = carouselContainer.querySelector('.overflow-hidden');
            const vw = viewport.clientWidth;
            const perPage = desktopPerPage;
            const totalGap = gap * (perPage - 1);
            itemWidth = Math.floor((vw - totalGap) / perPage);
            
            // Update all items width
            document.querySelectorAll(`[data-carousel="${selector}"] .carousel-item`).forEach(item => {
                item.style.width = itemWidth + 'px';
                item.style.minWidth = itemWidth + 'px';
            });
        }

        function updateTransform() {
            const step = itemWidth * desktopPerPage + gap * (desktopPerPage - 1);
            let translateAmount = -step * currentPage;
            
            if (isRTL) {
                translateAmount = step * currentPage;
            }
            
            track.style.transform = `translateX(${translateAmount}px)`;
        }

        function goToPage(page) {
            const maxPage = Math.ceil(items.length / desktopPerPage) - 1;
            currentPage = Math.min(Math.max(page, 0), maxPage);
            updateTransform();
            renderDots();
        }

        // Handle resize
        window.addEventListener('resize', () => {
            updateItemWidth();
            updateTransform();
        });

        // Initialize
        renderItems();
        requestAnimationFrame(() => {
            updateItemWidth();
            updateTransform();
            renderDots();
        });
    }
});
