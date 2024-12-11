document.addEventListener("DOMContentLoaded", () => {
    const categories = document.querySelectorAll(".category");
    const nextButton = document.querySelector(".next-button");
    const maxSelections = 3; 
    let selectedGenres = []; 

    function updateNextButton() {
        if (selectedGenres.length > 0) {
            nextButton.disabled = false; 
        } else {
            nextButton.disabled = true;
        }
    }

    categories.forEach((category) => {
        category.addEventListener("click", () => {
            const genre = category.querySelector("span").innerText;


            if (category.classList.contains("selected")) {
                category.classList.remove("selected");
                selectedGenres = selectedGenres.filter((item) => item !== genre);
            } 

            else if (selectedGenres.length < maxSelections) {
                category.classList.add("selected");
                selectedGenres.push(genre);
            } else {
                alert(`Anda hanya dapat memilih maksimal ${maxSelections} genre.`);
            }

            updateNextButton(); 
        });
    });

    nextButton.addEventListener("click", () => {
        if (selectedGenres.length > 0) {
            window.location.href = "/halamanutama";
        }
    });

    updateNextButton();
});
