<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Powered Essay Grading System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../CSS/home.css">   
    <link rel="stylesheet" href="../CSS/navbar.css"> 
</head>
<body>


        <?php include 'navbar.php'; ?>

   

<!-- dwdwdwd sdsdsajdhjkajs w dwd-->
 


    <section class="hero">
      <div class="sidebar">
        <ul>
            <li><a href="#">Certifications</a></li>
            <li><a href="#">Your Progress</a></li>
            <li><a href="#">Student Discussion</a></li>
            <li><a href="#">Account</a></li>
        </ul>
    </div>
        <h1>Improve Your Writing with AI-Powered Feedback</h1>
        <div class="container">
            <h1>Write your Essay Here:</h1>
            <div class="options">
                <!-- Text Format -->
                <button id="bold" class="option-button format">
                    <i class="fas fa-bold"></i>
                </button>
                <button id="italic" class="option-button format">
                    <i class="fas fa-italic"></i>
                </button>
                <button id="underline" class="option-button format">
                    <i class="fas fa-underline"></i>
                </button>
                <button id="strikethrough" class="option-button format">
                    <i class="fas fa-strikethrough"></i>
                </button>
                <button id="superscript" class="option-button script">
                    <i class="fas fa-superscript"></i>
                </button>
                <button id="subscript" class="option-button script">
                    <i class="fas fa-subscript"></i>
                </button>

                <!-- List -->
                <button id="insertOrderedList" class="option-button">
                    <i class="fas fa-list-ol"></i>
                </button>
                <button id="insertUnorderedList" class="option-button">
                    <i class="fas fa-list-ul"></i>
                </button>

                <!-- Undo/Redo -->
                <button id="undo" class="option-button">
                    <i class="fas fa-undo"></i>
                </button>
                <button id="redo" class="option-button">
                    <i class="fas fa-redo"></i>
                </button>

                <!-- Link -->
                <button id="createLink" class="option-button">
                    <i class="fas fa-link"></i>
                </button>
                <button id="unlink" class="option-button">
                    <i class="fas fa-unlink"></i>
                </button>

                <!-- Alignment -->
                <button id="justifyLeft" class="option-button align">
                    <i class="fas fa-align-left"></i>
                </button>
                <button id="justifyCenter" class="option-button align">
                    <i class="fas fa-align-center"></i>
                </button>
                <button id="justifyRight" class="option-button align">
                    <i class="fas fa-align-right"></i>
                </button>
                <button id="justifyFull" class="option-button align">
                    <i class="fas fa-align-justify"></i>
                </button>
                <button id="indent" class="option-button spacing">
                    <i class="fas fa-indent"></i>
                </button>
                <button id="outdent" class="option-button spacing">
                    <i class="fas fa-outdent"></i>
                </button>

                <!-- Headings -->
                <select id="formatBlock" class="option-button">
                    <option value="H1">H1</option>
                    <option value="H2">H2</option>
                    <option value="H3">H3</option>
                    <option value="H4">H4</option>
                    <option value="H5">H5</option>
                    <option value="H6">H6</option>
                </select>

                <!-- Font Size -->
                <select id="fontSize" class="option-button">
                    <option value="1">Size 1</option>
                    <option value="2">Size 2</option>
                    <option value="3" selected>Size 3</option>
                    <option value="4">Size 4</option>
                    <option value="5">Size 5</option>
                    <option value="6">Size 6</option>
                </select>

                <!-- Font Name -->
                <select id="fontName" class="option-button" style="width: 185px;">
                    <option value="Arial">Arial</option>
                    <option value="Verdana">Verdana</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Garamond">Garamond</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Courier New">Courier New</option>
                    <option value="cursive">Cursive</option>
                </select>
            </div>
            <div id="text-input" contenteditable="true" placeholder="Start writing your essay..."></div>
            <div class="button-container">
                <button class="cta check-plagiarism">Check Plagiarism</button>
                <button class="cta check-grammar">Check Grammar</button>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 EssayGrader. All rights reserved.</p>
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">FAQs</a></li>
        </ul>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">LinkedIn</a>
        </div>
    </footer>

    <script src="../JavaScrypt/home.js"></script>
</body>
</html>