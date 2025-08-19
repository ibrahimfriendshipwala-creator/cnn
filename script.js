document.addEventListener('DOMContentLoaded', () => {
    // Confirm deletion of articles
    const deleteLinks = document.querySelectorAll('.article-actions a.delete');
    deleteLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            const confirmed = confirm('Are you sure you want to delete this article? This action cannot be undone.');
            if (!confirmed) {
                event.preventDefault(); // Cancel the delete action
            }
        });
    });

    // Toggle content visibility in article list (optional)
    const toggleContentButtons = document.querySelectorAll('.toggle-content');
    toggleContentButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.previousElementSibling;
            if (content.style.display === 'none' || content.style.display === '') {
                content.style.display = 'block';
                button.textContent = 'Show Less';
            } else {
                content.style.display = 'none';
                button.textContent = 'Show More';
            }
        });
    });

    // Client-side validation for forms
    const articleForm = document.querySelector('form');
    if (articleForm) {
        articleForm.addEventListener('submit', (event) => {
            const title = document.querySelector('input[name="title"]');
            const content = document.querySelector('textarea[name="content"]');
            const imageUrl = document.querySelector('input[name="image_url"]');

            if (!title.value.trim() || !content.value.trim() || !imageUrl.value.trim()) {
                alert('Please fill in all fields before submitting.');
                event.preventDefault(); // Prevent form submission
            }
        });
    }
});
