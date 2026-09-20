<?php

$pageTitle = 'Neuromodulation';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($pageTitle) ?></title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f4f6f8;
        }

        .container {
            max-width: 1000px;
        }

        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: #005eb8;
            color: white;
            font-weight: 600;
        }

        .question {
            border-bottom: 1px solid #e5e5e5;
            padding: 20px 0;
        }

        .question:last-child {
            border-bottom: none;
        }

        .score-value {
            font-size: 2rem;
            font-weight: 700;
            color: #005eb8;
        }

        .range-value {
            min-width: 40px;
            display: inline-block;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="text-center mb-4">
        <h1>Neuromodulation</h1>
        <p class="text-muted">
            Brief Pain Inventory
        </p>
    </div>

    <form method="post" action="">

        <!-- Patient Details -->

        <div class="card mb-4">

            <div class="card-header">
                Patient Details
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">
                            First Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="firstName"
                            name="firstName"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="surname" class="form-label">
                            Surname
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="surname"
                            name="surname"
                            required
                        >
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="dateOfBirth" class="form-label">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="dateOfBirth"
                            name="dateOfBirth"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">
                            Age
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="age"
                            name="age"
                            readonly
                        >
                    </div>

                </div>

            </div>
        </div>


        <!-- Brief Pain Inventory -->

        <div class="card mb-4">

            <div class="card-header">
                Brief Pain Inventory (BPI)
            </div>

            <div class="card-body">

                <!-- Question 1 -->

                <div class="question">

                    <label for="question1" class="form-label fw-semibold">
                        1. How much relief have pain treatments or medications
                        from this clinic provided?
                    </label>

                    <div class="d-flex align-items-center gap-3">

                        <input
                            type="range"
                            class="form-range"
                            id="question1"
                            name="question1"
                            min="0"
                            max="100"
                            value="0"
                        >

                        <span
                            class="range-value"
                            id="question1Value"
                        >0%</span>

                    </div>

                </div>


                <!-- Question 2 -->

                <div class="question">

                    <label for="question2" class="form-label fw-semibold">
                        2. Please rate your pain based on the number that best
                        describes your pain at its WORST in the past week.
                    </label>

                    <div class="d-flex align-items-center gap-3">

                        <input
                            type="range"
                            class="form-range score-input"
                            id="question2"
                            name="question2"
                            min="0"
                            max="10"
                            value="0"
                        >

                        <span
                            class="range-value"
                            id="question2Value"
                        >0</span>

                    </div>

                </div>


                <!-- Question 3 -->

                <div class="question">

                    <label for="question3" class="form-label fw-semibold">
                        3. Please rate your pain based on the number that best
                        describes your pain at its LEAST in the past week.
                    </label>

                    <div class="d-flex align-items-center gap-3">

                        <input
                            type="range"
                            class="form-range score-input"
                            id="question3"
                            name="question3"
                            min="0"
                            max="10"
                            value="0"
                        >

                        <span
                            class="range-value"
                            id="question3Value"
                        >0</span>

                    </div>

                </div>


                <!-- Question 4 -->

                <div class="question">

                    <label for="question4" class="form-label fw-semibold">
                        4. Please rate your pain based on the number that best
                        describes your pain on the Average.
                    </label>

                    <div class="d-flex align-items-center gap-3">

                        <input
                            type="range"
                            class="form-range score-input"
                            id="question4"
                            name="question4"
                            min="0"
                            max="10"
                            value="0"
                        >

                        <span
                            class="range-value"
                            id="question4Value"
                        >0</span>

                    </div>

                </div>


                <!-- Question 5 -->

                <div class="question">

                    <label for="question5" class="form-label fw-semibold">
                        5. Please rate your pain based on the number that best
                        describes how much pain you have RIGHT NOW.
                    </label>

                    <div class="d-flex align-items-center gap-3">

                        <input
                            type="range"
                            class="form-range score-input"
                            id="question5"
                            name="question5"
                            min="0"
                            max="10"
                            value="0"
                        >

                        <span
                            class="range-value"
                            id="question5Value"
                        >0</span>

                    </div>

                </div>


                <?php

                $questions = [
                    6 => 'General Activity',
                    7 => 'Mood',
                    8 => 'Walking ability',
                    9 => 'Normal work (includes work both outside the home and housework)',
                    10 => 'Relationships with other people',
                    11 => 'Sleep',
                    12 => 'Enjoyment of life'
                ];

                foreach ($questions as $number => $description):

                ?>

                    <div class="question">

                        <label
                            for="question<?= $number ?>"
                            class="form-label fw-semibold"
                        >
                            <?= $number ?>.
                            Based on the number that best describes how
                            during the past week pain has INTERFERED with
                            your: <?= htmlspecialchars($description) ?>.
                        </label>

                        <div class="d-flex align-items-center gap-3">

                            <input
                                type="range"
                                class="form-range score-input"
                                id="question<?= $number ?>"
                                name="question<?= $number ?>"
                                min="0"
                                max="10"
                                value="0"
                            >

                            <span
                                class="range-value"
                                id="question<?= $number ?>Value"
                            >0</span>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>


        <!-- Total Score -->

        <div class="card mb-4">

            <div class="card-header">
                Total Score
            </div>

            <div class="card-body text-center">

                <div class="score-value" id="totalScore">
                    0
                </div>

                <p class="text-muted mb-0">
                    Total score from questions 2–12
                </p>

            </div>

        </div>


        <div class="d-flex justify-content-end gap-2">

            <button
                type="reset"
                class="btn btn-outline-secondary"
            >
                Clear
            </button>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Submit Form
            </button>

        </div>

    </form>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function () {

    // Calculate age from date of birth
    $('#dateOfBirth').on('change', function () {

        const dateOfBirth = new Date($(this).val());
        const today = new Date();

        if (isNaN(dateOfBirth.getTime())) {
            $('#age').val('');
            return;
        }

        let age = today.getFullYear() - dateOfBirth.getFullYear();

        const monthDifference =
            today.getMonth() - dateOfBirth.getMonth();

        if (
            monthDifference < 0 ||
            (
                monthDifference === 0 &&
                today.getDate() < dateOfBirth.getDate()
            )
        ) {
            age--;
        }

        if (age >= 0) {
            $('#age').val(age);
        } else {
            $('#age').val('');
        }
    });


    // Update slider values
    $('input[type="range"]').on('input', function () {

        const id = $(this).attr('id');
        const value = $(this).val();

        if (id === 'question1') {
            $('#' + id + 'Value').text(value + '%');
        } else {
            $('#' + id + 'Value').text(value);
        }

        calculateTotal();
    });


    // Calculate questions 2–12
    function calculateTotal() {

        let total = 0;

        $('.score-input').each(function () {
            total += parseInt($(this).val(), 10) || 0;
        });

        $('#totalScore').text(total);
    }


    // Reset total after form reset
    $('form').on('reset', function () {

        setTimeout(function () {

            $('#age').val('');

            $('#question1Value').text('0%');

            for (let i = 2; i <= 12; i++) {
                $('#question' + i + 'Value').text('0');
            }

            $('#totalScore').text('0');

        }, 0);

    });

});

</script>

</body>
</html>

