document.addEventListener('DOMContentLoaded', function() {
            // Image gallery functionality
            const mainImage = document.getElementById('main-image');
            const thumbnails = document.querySelectorAll('.thumbnail');
            
            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    // Update main image
                    mainImage.src = this.getAttribute('data-image');
                    
                    // Update active thumbnail
                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Size selector functionality
            const sizeOptions = document.querySelectorAll('.size-option');
            
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(o => o.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Color selector functionality
            const colorOptions = document.querySelectorAll('.color-option');
            
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    colorOptions.forEach(o => o.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Quantity selector functionality
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease');
            const increaseBtn = document.getElementById('increase');
            
            decreaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value < 10) {
                    quantityInput.value = value + 1;
                }
            });
            
            // Tab functionality
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Update active tab
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show relevant content
                    tabContents.forEach(content => {
                        content.classList.remove('active');
                        if (content.id === tabId) {
                            content.classList.add('active');
                        }
                    });
                });
            });
            
            // Add to cart functionality
            const addToCartBtn = document.getElementById('add-to-cart');
            
            addToCartBtn.addEventListener('click', function() {
                const selectedSize = document.querySelector('.size-option.selected').textContent;
                const selectedColor = document.querySelector('.color-option.selected').getAttribute('data-color');
                const quantity = document.getElementById('quantity').value;
                
                // In a real application, you would add the product to cart
                // and then redirect to the cart page
                
                alert(`Added to cart: ${quantity} x Premium Streetwear Hoodie (${selectedSize}, ${selectedColor})`);
                window.location.href = 'cart.html';
            });
            
            // Pixel API button functionality
            const pixelBtn = document.getElementById('pixel-track');
            
            pixelBtn.addEventListener('click', function() {
                // In a real application, this would trigger the Facebook Pixel
                // to track the view content event
                
                alert('Product view tracked with Pixel API');
                
                // Example Pixel code (commented out as it requires actual Pixel ID)
                /*
                fbq('track', 'ViewContent', {
                    content_name: 'Premium Streetwear Hoodie',
                    content_category: 'Streetwear',
                    content_ids: ['RM-SW-HD-001'],
                    content_type: 'product',
                    value: 599.99,
                    currency: 'ZAR'
                });
                */
            });
        });