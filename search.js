document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".search-bar input");
    const jobPosts = document.querySelectorAll(".job-post");

    searchInput.addEventListener("keyup", function() {
        const searchTerm = searchInput.value.toLowerCase();

        jobPosts.forEach(job => {
            const jobTitle = job.getAttribute("data-title").toLowerCase();
            const companyName = job.getAttribute("data-company").toLowerCase();

            if (jobTitle.includes(searchTerm) || companyName.includes(searchTerm)) {
                job.style.display = ""; // Show job post
            } else {
                job.style.display = "none"; // Hide job post
            }
        });
    });
});
