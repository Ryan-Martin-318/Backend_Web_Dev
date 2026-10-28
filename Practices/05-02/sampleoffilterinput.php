<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>filter_input Practice</title>
</head>

<body>
    <h1>filter_input Practice</h1>

    <?php
    $test = filter_input(INPUT_GET, 'test');

    echo '<pre>';
    var_dump($test);
    echo '</pre>';

    // *************** filter_input ******************
    if ($test === null) {
        echo '<p>The field was not submitted.</p>';
    } elseif ($test === '') {
        echo '<p>The field was submitted empty.</p>';
    } else {
        echo '<p>You entered: '
            . htmlspecialchars($test)
            . '</p>';
    }

    // if ($test)
    // {
    //     echo("yes");
    // } else {
    //     echo ("no");
    // }

    // *************** filter_input with validataion ******************
    $emailResult = filter_input(
        INPUT_POST,
        'email',
        FILTER_VALIDATE_EMAIL
    );

    echo 'Email: <pre>';
    var_dump($emailResult);
    echo '</pre>';



    ?>

    <form action="sampleoffilterinput.php" method="post">
        <label for="test">Test value</label>
        <input type="test" id="test" name="test">
        <button type="submit">Submit</button>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        
    </form>
    <hr>
    <p>Test Values</p>
    <ol>
        <li>
            <strong>No submission:</strong>
            The query string is absent from the URL.
            <br>
            <code style="color: #c62828;">sampleoffilterinput.php</code>
        </li>

        <li>
            <strong>Empty submission:</strong>
            The field was submitted without a value.
            <br>
            <code style="color: #c62828;">sampleoffilterinput.php?test=</code>
        </li>

        <li>
            <strong>Normal word:</strong>
            The field contains a text value.
            <br>
            <code style="color: #c62828;">sampleoffilterinput.php?test=hello</code>
        </li>

        <li>
            <strong>Zero:</strong>
            The field contains the string value <code style="color: #c62828;">"0"</code>.
            <br>
            <code style="color: #c62828;">sampleoffilterinput.php?test=0</code>
        </li>
    </ol>

    <!-- Notes -->


    <div style="margin-top: 24px; padding: 18px 22px; border-left: 5px solid #c62828; background-color: #fff5f5;">
        <section style="margin-top: 24px;">
            <h3>filter_input() Notes (268 - 273)</h3>

            <details style="margin-bottom: 10px;">
                <summary><strong>Retrieving a Value</strong></summary>

                <div style="padding: 10px 20px;">
                    <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">$test = filter_input(INPUT_GET, 'test');</code></pre>

                    <ul>
                        <li>Not submitted: <code style="color: #c62828;">null</code></li>
                        <li>Submitted empty: <code style="color: #c62828;">""</code></li>
                        <li>Submitted with data: returns the submitted string</li>
                    </ul>
                </div>
            </details>

            <details style="margin-bottom: 10px;">
                <summary><strong>Using a Validation Filter</strong></summary>

                <div style="padding: 10px 20px;">
                    <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);</code></pre>

                    <ul>
                        <li>Not submitted: <code style="color: #c62828;">null</code></li>
                        <li>Invalid value: <code style="color: #c62828;">false</code></li>
                        <li>Valid value: returns the submitted value</li>
                    </ul>
                </div>
            </details>

            <details style="margin-bottom: 10px;">
                <summary><strong>Common Validation Filters</strong></summary>

                <div style="padding: 10px 20px;">
                    <ul>
                        <li>
                            <code style="color: #c62828;">FILTER_VALIDATE_EMAIL</code>:
                            checks an email address
                        </li>
                        <li>
                            <code style="color: #c62828;">FILTER_VALIDATE_INT</code>:
                            checks for an integer
                        </li>
                        <li>
                            <code style="color: #c62828;">FILTER_VALIDATE_FLOAT</code>:
                            checks for a decimal number
                        </li>
                        <li>
                            <code style="color: #c62828;">FILTER_VALIDATE_URL</code>:
                            checks a URL
                        </li>
                    </ul>
                </div>
            </details>

            <details>
                <summary><strong>Important Reminder</strong></summary>

                <div style="padding: 10px 20px;">
                    <p>
                        A validation filter checks whether a value has an acceptable
                        format. It does not correct the value.
                    </p>

                    <p>
                        Use <code style="color: #c62828;">htmlspecialchars()</code>
                        when displaying submitted data in HTML.
                    </p>
                </div>
            </details>
        </section>
    </div>
    
</body>

</html>