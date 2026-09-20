<?php

require_once __DIR__ . '/../src/Database.php';

$pageTitle = 'Neuromodulation - Admin';

try {
    $database = new Database();
    $connection = $database->getConnection();

    $statement = $connection->prepare(
        '{CALL dbo.NeuromodulationForm_GetAll}'
    );

    $statement->execute();

    $forms = $statement->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $exception) {

    $error = 'Unable to load completed forms.';
    $forms = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

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
            max-width: 1200px;
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

        .clickable-row {
            cursor: pointer;
        }

        .clickable-row:hover {
            background-color: #f0f6fb;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Neuromodulation</h1>

            <p class="text-muted mb-0">
                Administration
            </p>
        </div>

        <a
            href="index.php"
            class="btn btn-primary"
        >
            New Form
        </a>

    </div>


    <?php if (isset($error)): ?>

        <div class="alert alert-danger">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <div class="card-header">
            Completed Forms
        </div>

        <div class="card-body">

            <?php if (empty($forms)): ?>

                <p class="text-muted text-center mb-0">
                    No completed forms have been submitted.
                </p>

            <?php else: ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>

                            <tr>

                                <th>
                                    Date of Submission
                                </th>

                                <th>
                                    First Name
                                </th>

                                <th>
                                    Surname
                                </th>

                                <th>
                                    Age
                                </th>

                                <th>
                                    Date of Birth
                                </th>

                                <th>
                                    Total Score
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php foreach ($forms as $form): ?>

                            <?php

                            $dateOfBirth = new DateTime(
                                $form['DateOfBirth']
                            );

                            $today = new DateTime();

                            $age = $today->diff($dateOfBirth)->y;

                            $submissionDate = new DateTime(
                                $form['SubmittedAt']
                            );

                            ?>

                            <tr
                                class="clickable-row"
                                onclick="window.location.href='view.php?id=<?= (int) $form['FormId'] ?>'"
                            >

                                <td>
                                    <?= htmlspecialchars(
                                        $submissionDate->format('d/m/Y H:i')
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $form['FirstName']
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $form['Surname']
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        (string) $age
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $dateOfBirth->format('d/m/Y')
                                    ) ?>
                                </td>

                                <td>

                                    <span class="badge bg-primary">

                                        <?= htmlspecialchars(
                                            (string) $form['TotalScore']
                                        ) ?>

                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>