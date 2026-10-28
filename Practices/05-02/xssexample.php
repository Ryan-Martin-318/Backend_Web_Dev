<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escaping Output</title>
</head>

<body>
    <h1>Comment Example</h1>

    <form action="xssexample.php" method="get">
        <label for="comment">Comment</label>
        <input type="text" id="comment" name="comment">
        <button type="submit">Add Comment</button>
    </form>

    <?php
    if (isset($_GET['comment'])) {
        // Begin by echoing the value directly and observing the result.
        // echo $_GET['comment'];

        // Then replace the direct echo with:
        echo htmlspecialchars($_GET['comment']);
    }
    ?>

    <!-- NOTES htmlspecialchars page 246-->
    <div style="margin-top: 24px; padding: 18px 22px; border-left: 5px solid #c62828; background-color: #fff5f5;">
        <p>A PHP function that replaces HTML reserved characters with their corresponding entities
        <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">&amp;lt;h1&amp;gt;hello&amp;lt;/h1&amp;gt;</code></pre>
        <section style="margin-top: 24px;">
            <h3>htmlspecialchars() Notes</h3>

            <details style="margin-bottom: 10px;">
                <summary><strong>Why It Is Needed</strong></summary>

                <div style="padding: 10px 20px;">
                    <p>
                        Submitted data can contain characters that the browser interprets
                        as HTML.
                    </p>

                    <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">echo $_GET['comment'];</code></pre>

                    <p>
                        If the submitted comment contains an HTML element, the browser
                        may process that element instead of displaying it as text.
                    </p>
                </div>
            </details>

            <details style="margin-bottom: 10px;">
                <summary><strong>Basic Syntax</strong></summary>

                <div style="padding: 10px 20px;">
                    <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">echo htmlspecialchars($_GET['comment']);</code></pre>

                    <p>
                        The submitted value is passed to
                        <code style="color: #c62828;">htmlspecialchars()</code>
                        before it is displayed.
                    </p>
                </div>
            </details>

            <details style="margin-bottom: 10px;">
                <summary><strong>What It Does</strong></summary>

                <div style="padding: 10px 20px;">
                    <p>
                        <code style="color: #c62828;">htmlspecialchars()</code>
                        converts special HTML characters into HTML entities.
                    </p>

                    <ul>
                        <li>
                            <code style="color: #c62828;">&lt;</code>
                            becomes
                            <code style="color: #c62828;">&amp;lt;</code>
                        </li>
                        <li>
                            <code style="color: #c62828;">&gt;</code>
                            becomes
                            <code style="color: #c62828;">&amp;gt;</code>
                        </li>
                        <li>
                            <code style="color: #c62828;">&amp;</code>
                            becomes
                            <code style="color: #c62828;">&amp;amp;</code>
                        </li>
                    </ul>

                    <p>
                        The browser displays these characters as text instead of
                        interpreting them as HTML.
                    </p>
                </div>
            </details>

            <details style="margin-bottom: 10px;">
                <summary><strong>Example</strong></summary>

                <div style="padding: 10px 20px;">
                    <p><strong>Submitted value:</strong></p>

                    <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">&lt;strong&gt;Hello&lt;/strong&gt;</code></pre>

                    <p>
                        Without <code style="color: #c62828;">htmlspecialchars()</code>,
                        the browser displays <strong>Hello</strong> in bold.
                    </p>

                    <p>
                        With <code style="color: #c62828;">htmlspecialchars()</code>,
                        the browser displays the actual tags:
                    </p>

                    <pre style="padding: 12px; background-color: #f4f4f4;"><code style="color: #c62828;">&lt;strong&gt;Hello&lt;/strong&gt;</code></pre>
                </div>
            </details>

            <details>
                <summary><strong>Important Reminder</strong></summary>

                <div style="padding: 10px 20px;">
                    <p>
                        Use <code style="color: #c62828;">htmlspecialchars()</code>
                        when displaying submitted or user-controlled data in HTML.
                    </p>

                    <p>
                        It controls how the browser interprets the output. It does not
                        determine whether the submitted value is valid.
                    </p>
                </div>
            </details>
        </section>
    </div>
</body>

</html>