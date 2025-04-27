<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuItems = document.querySelectorAll("#profile-menu .list-group-item");
        const contentSections = document.querySelectorAll(".content-section");
        const breadcrumbCurrent = document.getElementById("breadcrumb-current");

        // Initially highlight the active menu item
        const initialActive = document.querySelector("#profile-menu .list-group-item.active");
        if (initialActive) {
            initialActive.classList.add("selected");
            initialActive.style.backgroundColor = "#1a1a2e";
            initialActive.style.color = "white";

            // Show the corresponding section
            const sectionId = initialActive.getAttribute("data-section");
            if (sectionId) {
                document.getElementById(sectionId).classList.remove("d-none");
                breadcrumbCurrent.textContent = initialActive.getAttribute("data-title");
            }
        }

        // Handle menu item clicks
        menuItems.forEach(item => {
            item.addEventListener("click", function (e) {
                e.preventDefault();

                // Remove active styles from all menu items
                menuItems.forEach(link => {
                    link.classList.remove("active", "selected");
                    link.style.backgroundColor = "";
                    link.style.color = "";
                });

                // Set active styles for the clicked item
                this.classList.add("active", "selected");
                this.style.backgroundColor = "#1a1a2e";
                this.style.color = "white";

                // Hide all sections
                contentSections.forEach(section => section.classList.add("d-none"));

                // Show the selected section
                const sectionId = this.getAttribute("data-section");
                if (sectionId) {
                    document.getElementById(sectionId).classList.remove("d-none");
                }

                // Update breadcrumb
                breadcrumbCurrent.textContent = this.getAttribute("data-title");
            });
        });
    });

    // Toggle Script
    function toggleSidebar() {
        const sidebar = document.getElementById('profile-menu');
        sidebar.classList.toggle('active'); // Add a CSS class for collapsed state
    }
</script>
