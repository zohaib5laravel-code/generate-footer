 
        // Toggle footer menu on mobile
        document.getElementById('footerToggle').addEventListener('click', function () {
            const footerContainer = document.getElementById('footerContainer');
            footerContainer.classList.toggle('active');

            // Change icon
            const icon = this.querySelector('i');
            if (footerContainer.classList.contains('active')) {
                icon.className = 'fas fa-times';
                this.innerHTML = '<i class="fas fa-times"></i> Close Footer';
            } else {
                icon.className = 'fas fa-bars';
                this.innerHTML = '<i class="fas fa-bars"></i> Footer Menu';
            }
        });

        // Newsletter form submission
        document.getElementById('newsletterForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const successMessage = document.getElementById('newsletterSuccess');

            // Show success message
            successMessage.style.display = 'block';

            // Reset form
            this.reset();

            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        });

        // Back to top button functionality
        const backToTopBtn = document.querySelector('.back-to-top');

        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.visibility = 'visible';
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.visibility = 'hidden';
            }
        });
        