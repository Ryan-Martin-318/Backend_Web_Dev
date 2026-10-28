<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>Form Submitted</title>

    <?php
    require __DIR__
        . '/includes/bootstrapcdnlinks.php';
    ?>
</head>

<body class="bg-light">
    <?php
    require __DIR__
        . '/includes/navigation.php';
    ?>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5 text-center">

                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success text-white mb-4"
                            style="width: 64px; height: 64px; font-size: 2rem;"
                            aria-hidden="true">
                            ✓
                        </div>

                        <h1 class="h2 mb-3">
                            Form Submitted
                        </h1>

                        <p class="lead">
                            Your information passed validation.
                        </p>

                        <p class="text-secondary mb-4">
                            This practice application does not save the
                            submitted information to a database.
                        </p>

                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <a
                                class="btn btn-primary"
                                href="newsletter.php">
                                Return to the Form
                            </a>

                            <a
                                class="btn btn-outline-secondary"
                                href="index.php">
                                Return Home
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
</body>

</html>