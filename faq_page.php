<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help (FAQ) - PetLife</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/faq_css.css">

    <script src="js/main.js" defer></script>
</head>
<body>
    
    <?php require 'include/header.php' ?>

    <div class="content">
        <section class="help-header">
            <h1>HELP (FAQ)</h1>
            <p>Do you need help?</p>
            <div class="help-description">
                <p>Greetings from our Help page! If you have any questions or concerns about our online pet care services, we are here to help. Our committed support staff is available to assist you with scheduling a veterinarian visit, navigating our pet store, or comprehending our grooming options. In order to get fast help, you can use our live chat tool to connect with us immediately or look up answers to frequently asked issues in our FAQ section. Please feel free to write us at support@example.com with more complicated questions, and we will respond as soon as we can. Our first focus is the welfare of your pet, and we're dedicated to giving you the finest assistance we can!</p>
            </div>
        </section>

        <section class="FAQ-section">
            <h2>FAQ</h2>
            <div class="FAQ-container">
                <div class="FAQ-item">
                    <button class="FAQ-question">General Questions</button>
                    <div class="FAQ-answer">
                        <p>Here are some general questions and answers...</p>
                    </div>
                </div>
                <div class="FAQ-item">
                    <button class="FAQ-question">Order Process</button>
                    <div class="FAQ-answer">
                        <p>Here is how our order process works...</p>
                    </div>
                </div>
                <div class="FAQ-item">
                    <button class="FAQ-question">Payment Information</button>
                    <div class="FAQ-answer">
                        <p>Details about payment options and processing...</p>
                    </div>
                </div>
                <div class="FAQ-item">
                    <button class="FAQ-question">Services Information</button>
                    <div class="FAQ-answer">
                        <p>Learn more about the services we provide...</p>
                    </div>
                </div>
                <div class="FAQ-item">
                    <button class="FAQ-question">Account Management</button>
                    <div class="FAQ-answer">
                        <p>Manage your account settings and preferences...</p>
                    </div>
                </div>
            </div>
        </section>
</div>
    <?php require 'include/footer.php' ?>
    <script>
      // FAQ  Script
const faqQuestions = document.querySelectorAll('.FAQ-question');

faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling;

        //  display the answer
        if (answer.style.display === 'block') {
            answer.style.display = 'none';
        } else {
            answer.style.display = 'block';
        }
    });
});
    </script>

</body>
</html>
