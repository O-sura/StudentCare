<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dropdown.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="dropdown-menu">
        <div class="select-btn">
            <span class="Sbtn-text">All Posts</span>
            <i class="fa-sharp fa-solid fa-chevron-down"></i>
        </div>
        <ul class="options">
            <li class="option">All Posts</li> 
            <li class="option">Your Posts</li> 
            <li class="option">Saved</li>
        </ul>
    </div>

<script>
    const optionMenu = document.querySelector('.dropdown-menu');
    const selectBtn = optionMenu.querySelector('.select-btn');
    const options = optionMenu.querySelectorAll('.option');
    const btnText = optionMenu.querySelector('.Sbtn-text');

    selectBtn.addEventListener("click", () => {
        optionMenu.classList.toggle("active");
    })

    options.forEach(option => {
        option.addEventListener("click", () => {
            let selectedOption = option.innerHTML;
            btnText.innerText = selectedOption;

            optionMenu.classList.remove("active");
        })
    })

</script>
</body>
</html>