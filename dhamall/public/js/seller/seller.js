
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
    }

    // Make the sidebar float when scrolling and stop at the footer
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const footer = document.querySelector("footer");
        const mainContent = document.querySelector(".main-content");

        window.addEventListener("scroll", function () {
            const sidebarRect = sidebar.getBoundingClientRect();
            const footerRect = footer.getBoundingClientRect();

            // Calculate the distance between the sidebar and the footer
            const distanceToFooter = footerRect.top - sidebarRect.height;

            // If the sidebar is going out of view and not overlapping the footer
            if (sidebarRect.top < 0 && distanceToFooter > 0) {
                sidebar.classList.add("fixed");
            } else {
                sidebar.classList.remove("fixed");
            }

            // If the sidebar is overlapping the footer, stop it
            if (distanceToFooter <= 0) {
                sidebar.style.top = `${distanceToFooter}px`;
            } else {
                sidebar.style.top = "20px"; // Reset top position when not overlapping
            }
        });
    });

    